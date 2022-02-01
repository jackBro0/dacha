<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DachaRequest;
use App\Models\Category;
use App\Models\Dacha;
use App\Models\DachaImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DachaController extends Controller
{
    public function index(Request $request)
    {
//        $name = null;
//        $category_id = null;
//        if (isset($request->name)){
//            $name = $request->name;
//        }
        $dacha = Dacha::with('images', 'category')
            ->when(isset($request->name), function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->name . '%');
            })
            ->when(isset($request->category_id), function ($query) use ($request) {
                return $query->where('category_id', $request->category_id);
            })
            ->paginate(10);
        $categories = Category::query()->get();
        return view('admin.pages.dacha.index', compact('dacha', 'categories'));
    }


    public function create()
    {
        $categories = Category::query()->get();
        return view('admin.pages.dacha.create', compact('categories'));
    }


    public function store(DachaRequest $request)
    {
        try {
            $dacha = new Dacha();
            $dacha->name = $request->name;
            $dacha->bathroom_count = $request->bathroom_count;
            $dacha->capacity = $request->capacity;
            $dacha->room_count = $request->room_count;
            $dacha->cost = $request->cost;
            $dacha->comforts = $request->comforts;
            $dacha->category_id = $request->category_id;

            if ($dacha->save()) {
                foreach ($request->image_path as $image) {
                    $dacha_image = new DachaImage();
                    $file_path = "storage/" . Storage::disk('public')->put("dachas", $image);
                    $dacha_image->image_path = $file_path;
                    $dacha_image->dacha_id = $dacha->id;
                    $dacha_image->save();
                }
            }
            return redirect()->route('dacha.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
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
        $dacha = Dacha::query()->findOrFail($id);
        return view('admin.pages.dacha.edit', compact('categories', 'dacha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     */
    public function update(DachaRequest $request, int $id)
    {
        try {
            $dacha = Dacha::findOrFail($id);
            $dacha->name = $request->name;
            $dacha->bathroom_count = $request->bathroom_count;
            $dacha->capacity = $request->capacity;
            $dacha->room_count = $request->room_count;
            $dacha->cost = $request->cost;
            $dacha->comforts = $request->comforts;
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
                    foreach ($request->exist_image_path as $key=>$image) {
                        $dacha_image = DachaImage::query()->findOrFail($key);
                        $file_path = "storage/" . Storage::disk('public')->put("dachas", $image);
                        $dacha_image->image_path = $file_path;
                        $dacha_image->dacha_id = $dacha->id;
                        $dacha_image->save();
                    }
                }
            }
            return redirect()->route('dacha.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
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
