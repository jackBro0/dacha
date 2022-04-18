<?php

namespace App\Http\Controllers;

use App\Http\Requests\DachaRequest;
use App\Models\Dacha;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
//        return Dacha::with('images', 'category', 'comforts')
//            ->when(isset($request->category_id) and $request->category_id != 0, function ($query) use ($request) {
//            return $query->where('category_id', $request->category_id);
//        })
//            ->orderByDesc('id')
//            ->paginate(10);
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
                $query->where('cost', '>=', (int) $request->cost_from);
            })
            ->when(isset($request->cost_to), function ($query) use ($request) {
                $query->where('cost', '<=', (int) $request->cost_to);
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
        try {
            $dacha = new Dacha();
            $dacha->created_by = Auth::id();
            $file = $request->file('image_path');
            $file_path = "storage/" . Storage::disk('public')->put("dachas", $file);
            $dacha->name = $request->name;
            $dacha->bathroom_count = $request->bathroom_count;
            $dacha->capacity = $request->capacity;
            $dacha->room_count = $request->room_count;
            $dacha->cost = $request->cost;
            $dacha->category_id = $request->category_id;
            $dacha->image_path = $file_path;
            $dacha->save();
            return response()->json([
                'message' => 'success',
                'status' => 200
            ]);
        } catch (\Exception $e) {
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
        try {
            $dacha = Dacha::findOrFail($id);
            $file = $request->file('image_path');
            $file_path = "storage/" . Storage::disk('public')->put("dachas", $file);
            $dacha->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'room_count' => $request->room_count,
                'bathroom_count' => $request->bathroom_count,
                'capacity' => $request->capacity,
                'cost' => $request->cost,
                'image_path' => $file_path,
            ]);
            return response()->json([
                'message' => 'Success',
                'status' => 200
            ]);
        } catch (\Exception $e) {
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
        where('top_rated', true)->orderByDesc('id')->get();
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
}
