<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentDachaRequest;
use App\Models\RentDacha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RentDachaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $orders = RentDacha::query()
            ->when(isset($request->name), function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->name . '%');
            })
            ->orderByDesc('id')
            ->paginate(10);
        return view('admin.pages.rent-dacha.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.pages.rent-dacha.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(RentDachaRequest $request)
    {
        $rent = new RentDacha();
        $rent->name = $request->name;
        $rent->phone = $request->phone;
        $rent->description = $request->description;
        $rent->save();
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rent_info = RentDacha::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $orders = RentDacha::query()->findOrFail($id);
        return view('admin.pages.rent-dacha.edit', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(RentDachaRequest $request, $id)
    {
        $rent = RentDacha::query()->findOrFail($id);
        $rent->name = $request->name;
        $rent->phone = $request->phone;
        $rent->description = $request->description;
        $rent->save();
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RentDacha::query()->findOrFail($id)->delete();
    }
}
