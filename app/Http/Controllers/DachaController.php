<?php

namespace App\Http\Controllers;

use App\Http\Requests\DachaRequest;
use App\Models\Comfort;
use App\Models\ComfortDacha;
use App\Models\Dacha;
use App\Models\DachaImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DachaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $dacha = Dacha::with('images', 'category', 'comforts')
            ->when(isset($request->category_id) and $request->category_id != 0, function ($query) use ($request) {
                $query->where('category_id', (int)$request->category_id);
            })
            ->when(isset($request->top_rated) and $request->top_rated == 1, function ($query) use ($request) {
                $query->where('top_rated', true);
            })
            ->when(isset($request->capacity), function ($query) use ($request) {
                $query->where('capacity', (int)$request->capacity);
            })
            ->when(isset($request->cost_from), function ($query) use ($request) {
                $query->where('cost', '>=', (int)$request->cost_from);
            })
            ->when(isset($request->cost_to), function ($query) use ($request) {
                $query->where('cost', '<=', (int)$request->cost_to);
            })
            ->when(isset($request->comfort_id), function ($query) use ($request) {
                foreach ($request->comfort_id as $id) {
                    $query->whereHas('comforts', function ($q) use ($id) {
                        $q->where('comforts.id', $id);
                    });
                }
            })
            ->when(isset($request->name), function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('name_uz', 'LIKE', "%$request->name%")
                        ->orWhere('name_ru', 'LIKE', "%$request->name%");
                });

            })
            ->orderByDesc('id')
            ->paginate(10);
        try {
            return response()->json([
                'data' => $dacha
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception,
                'message' => 'Something went wrong'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DachaRequest $request
     * @return JsonResponse
     */
    public function store(DachaRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $dacha = new Dacha();
            $dacha->created_by = Auth::id();
            $dacha->name_uz = $request->name_uz;
            $dacha->name_ru = $request->name_ru;
            $dacha->bathroom_count = $request->bathroom_count;
            $dacha->capacity = $request->capacity;
            $dacha->room_count = $request->room_count;
            $dacha->cost = $request->cost;
            $dacha->phone = $request->phone;
            if ($request->top_rated == null) {
                $dacha->top_rated = 0;
            } else {
                $dacha->top_rated = $request->top_rated;
            }
            $dacha->category_id = $request->category_id;

            if ($dacha->save()) {
                foreach ($request->image_path as $image) {
                    $dacha_image = new DachaImage();
                    $file_path = "storage/" . Storage::disk('public')->put("dachas", $image);
                    $dacha_image->image_path = $file_path;
                    $dacha_image->dacha_id = $dacha->id;
                    $dacha_image->save();
                }
                if (!empty($request->comforts)) {
                    foreach ($request->comforts as $comfort) {
                        ComfortDacha::query()->create(
                            [
                                'comfort_id' => $comfort,
                                'dacha_id' => $dacha->id,
                            ]
                        );
                    }
                }
            }
            DB::commit();
            return response()->json([
                'message' => 'success',
                'status' => 200
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $dacha = Dacha::with('images', 'category', 'comforts')->findOrFail($id);
        try {
            return response()->json([
                'data' => $dacha
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception,
                'message' => 'Something went wrong'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DachaRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(DachaRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $dacha = Dacha::findOrFail($id);
            if ($dacha->created_by != Auth::id()) {
                return response()->json('permission denied', 403);
            }
            $dacha->name_uz = $request->name_uz;
            $dacha->name_ru = $request->name_ru;
            $dacha->bathroom_count = $request->bathroom_count;
            $dacha->capacity = $request->capacity;
            $dacha->room_count = $request->room_count;
            $dacha->cost = $request->cost;
            $dacha->phone = $request->phone;
            if ($request->top_rated == null) {
                $dacha->top_rated = 0;
            } else {
                $dacha->top_rated = $request->top_rated;
            }
            $dacha->category_id = $request->category_id;

            if ($dacha->update()) {
                if (!empty($request->exist_image)) {
                    $exist_image_path = DachaImage::query()->where('dacha_id', $dacha->id)->pluck('id')->toArray();
                    foreach ($exist_image_path as $image) {
                        if (!in_array($image, $request->exist_image)) {
                            DachaImage::query()->findOrFail($image)->delete();
                        }
                    }
                }

                if (!empty($request->image_path)) {
                    foreach ($request->image_path as $image) {
                        $dacha_image = new DachaImage();
                        $file_path = "storage/" . Storage::disk('public')->put("dachas", $image);
                        $dacha_image->image_path = $file_path;
                        $dacha_image->dacha_id = $dacha->id;
                        $dacha_image->save();
                    }
                }

                if (!empty($request->exist_image_path)) {
                    foreach ($request->exist_image_path as $key => $image) {
                        $dacha_image = DachaImage::query()->findOrFail($key);
                        $file_path = "storage/" . Storage::disk('public')->put("dachas", $image);
                        $dacha_image->image_path = $file_path;
                        $dacha_image->dacha_id = $dacha->id;
                        $dacha_image->save();
                    }
                }

                if (!empty($request->comforts)) {
                    $exist_comforts = ComfortDacha::query()->where('dacha_id', $id)->pluck('comfort_id')->toArray();
                    foreach ($request->comforts as $comfort) {
                        if (!in_array($comfort, $exist_comforts)) {
                            ComfortDacha::query()->create(
                                [
                                    'comfort_id' => $comfort,
                                    'dacha_id' => $dacha->id,
                                ]
                            );
                        }
                    }
                    foreach ($exist_comforts as $exist_comfort) {
                        if (!in_array($exist_comfort, $request->comforts)) {
                            ComfortDacha::query()->where('comfort_id', $exist_comfort)->delete();
                        }
                    }
                }
            }
            DB::commit();
            return response()->json([
                'message' => 'Success',
                'status' => 200
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e,
                'status' => 404
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $dacha = Dacha::findOrFail($id);
            if ($dacha->created_by != Auth::id()) {
                return response()->json('permission denied', 403);
            }
            $dacha->delete();
            return response()->json([
                'message' => 'success',
                'status' => 200
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e,
            ], 404);
        }
    }

    /**
     * Display a top rated dacha.
     *
     * @return JsonResponse
     */
    public function topRated(): JsonResponse
    {
        $dacha = Dacha::with('images', 'category', 'comforts')->
        where('top_rated', true)->orderByDesc('id')->paginate(10);
        try {
            return response()->json([
                'data' => $dacha
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception,
                'message' => 'Something went wrong'
            ]);
        }
    }

    public function dachaByArray(Request $request)
    {
        $request->validate(
            [
                'ids_array' => 'required | array'
            ]
        );
        $dacha = Dacha::query()
            ->with('images', 'category', 'comforts')
            ->whereIn('id', $request->ids_array)
            ->get();

        return response()->json([
            'data' => $dacha
        ]);
    }

    public function userDachaList(Request $request)
    {
        $dacha = Dacha::with('images', 'category', 'comforts')->
        where('created_by', Auth::id())->orderByDesc('id')->paginate(10);
        try {
            return response()->json([
                'data' => $dacha
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception,
                'message' => 'Something went wrong'
            ]);
        }
    }

    public function comfortList()
    {
        $com = Comfort::query()->get();
        try {
            return response()->json([
                'data' => $com
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
