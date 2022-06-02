<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComfortRequest;
use App\Models\Comfort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComfortController extends Controller
{
    public function index(Request $request)
    {
        $per_page = 10;
        if (isset($request->per_page)) {
            $per_page = (int) $request->per_page;
        }
        $comforts = Comfort::query()
            ->when(isset($request->name), function ($q) use ($request) {
                return $q->where('name_uz', 'like', '%' . $request->name . '%')
                    ->orWhere('name_ru', 'like', '%' . $request->name . '%');
            })
            ->orderByDesc('id')
            ->paginate($per_page);
        return view('admin.pages.comfort.index', compact('comforts'));
    }


    public function create()
    {
        return view('admin.pages.comfort.create');
    }


    public function store(ComfortRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $comfort = new Comfort();
            $comfort->name_uz = $request->name_uz;
            if(!empty($request->icon)){
                $icon = "storage/" . Storage::disk('public')->put("icons", $request->icon);
                $comfort->icon = $icon;
            }
            $comfort->name_ru = $request->name_ru;
            $comfort->save();
            return redirect()->route('comfort.index');
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
        $comfort = Comfort::query()->findOrFail($id);
        return view('admin.pages.comfort.edit', compact('comfort'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     */
    public function update(ComfortRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $comfort = Comfort::findOrFail($id);if(!empty($request->icon)){
                $icon = "storage/" . Storage::disk('public')->put("icons", $request->icon);
                $comfort->icon = $icon;
            }
            $comfort->name_uz = $request->name_uz;
            $comfort->name_ru = $request->name_ru;
            $comfort->update();
            return redirect()->route('comfort.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $dacha = Comfort::findOrFail($id);
            $dacha->delete();
            return redirect()->route('comfort.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
