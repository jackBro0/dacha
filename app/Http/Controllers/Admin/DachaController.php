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
    public function index()
    {
        $dacha = Dacha::with('images', 'category')->paginate(10);
        return view('admin.pages.dacha.index', compact('dacha'));
    }


    public function create()
    {
        $categories = Category::query()->get();
        return view('admin.pages.dacha.create', compact('categories'));
    }


    public function store(DachaRequest $request)
    {
        try {
            $dacha= new Dacha();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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


    public function destroy(int $id)
    {
        try {
            $dacha = Dacha::findOrFail($id);
            $dacha->delete();
            return redirect()->route('dacha.index');
        }catch (\Exception $e){
            return redirect()->back();
        }
    }
}
