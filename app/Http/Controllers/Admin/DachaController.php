<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DachaRequest;
use App\Models\Category;
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
    public function index(Request $request)
    {
        $per_page = 10;
        if (isset($request->per_page)) {
            $per_page = (int)$request->per_page;
        }
        $dacha = Dacha::with('images', 'category')
            ->when(isset($request->name), function ($q) use ($request) {
                return $q->where('name_uz', 'like', '%' . $request->name . '%')
                    ->orWhere('name_ru', 'like', '%' . $request->name . '%');
            })
            ->when(isset($request->category_id) and $request->category_id != 0, function ($query) use ($request) {
                return $query->where('category_id', (int)$request->category_id);
            })
            ->when(isset($request->top_rated) and $request->top_rated == 1, function ($query) use ($request) {
                return $query->where('top_rated', true);
            })
            ->orderByDesc('id')
            ->paginate($per_page);
        $categories = Category::query()->get();
        return view('admin.pages.dacha.index', compact('dacha', 'categories'));
    }


    public function create()
    {
        $categories = Category::query()->get();
        $comforts = Comfort::query()->get();
        return view('admin.pages.dacha.create', compact('categories', 'comforts'));
    }


    public function store(DachaRequest $request)
    {
        DB::beginTransaction();
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
        DB::rollBack();
        return redirect()->route('dacha.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $categories = Category::query()->get();
        $dacha = Dacha::query()->with('comforts')->findOrFail($id);
        $comforts = Comfort::query()->get();
        return view('admin.pages.dacha.edit', compact('categories', 'dacha', 'comforts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     */
    public function update(DachaRequest $request, int $id)
    {
        DB::beginTransaction();
        $dacha = Dacha::findOrFail($id);
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
        DB::rollBack();
        return redirect()->route('dacha.index');
    }


    public function destroy(int $id)
    {
        try {
            $dacha = Dacha::findOrFail($id);
            $dacha->delete();
            return redirect()->route('dacha.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
