<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::query()->orderByDesc('id')->get();
        try {
            return response()->json([
                'data' => $categories
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
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();
            $category = new Category();
            $file = $request->file('image_path');
            $file_path = "storage/" . Storage::disk('public')->put("categories", $file);
            $category->name = $request->name;
            $category->image_path = $file_path;
            $category->save();
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
        $categories = Category::with('dacha')->findOrFail($id);
        try {
            return response()->json([
                'data' => $categories
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
     * @param CategoryRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, int $id): JsonResponse
    {
        try {
            $category = Category::findOrFail($id);
            $validated = $request->validate([
                'name' => 'required'
            ]);
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
            $category = Category::findOrFail($id);
            $category->delete();
            return response()->json([
                'message' => 'success',
                'status' => 200
            ]);
        }catch (\Exception $e){
            return response()->json([
               'error' => $e,
            ], 404);
        }
    }
}
