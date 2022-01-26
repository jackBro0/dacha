<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()->paginate(10);
        return view('admin.pages.category.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.pages.category.create');
    }


    public function store(CategoryRequest $request)
    {
        try {
            $category = new Category();
            $file = $request->file('image_path');
            $file_path = "storage/" . Storage::disk('public')->put("categories", $file);
            $category->name = $request->name;
            $category->image_path = $file_path;
            $category->save();
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


    public function show($id)
    {
        $category = Category::query()->findOrFail($id);
    }


    public function edit($id)
    {
        $category = Category::query()->findOrFail($id);
        return view('admin.pages.category.edit', compact('category'));
    }


    public function update(CategoryRequest $request, int $id)
    {
        try {
            $category = Category::findOrFail($id);
            if(!empty($request->image_path)){
                $file = $request->file('image_path');
                $file_path = "storage/" . Storage::disk('public')->put("categories", $file);
                $category->update([
                    'name' => $request->name,
                    'image_path' => $file_path,
                ]);
            }else{
                $category->update([
                    'name' => $request->name
                ]);
            }
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


    public function destroy(int $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('category.index');
        }catch (\Exception $e){
            return redirect()->back();
        }
    }
}
