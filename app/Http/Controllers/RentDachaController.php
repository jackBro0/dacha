<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentDachaRequest;
use App\Models\RentDacha;
use Illuminate\Database\Eloquent\Model;

class RentDachaController extends Controller
{
    public function rentDacha(RentDachaRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $rent = new RentDacha();
            $rent->name = $request->name;
            $rent->phone = $request->phone;
            $rent->description = $request->description;
            $rent->save();
            return response()->json([
                'message' => 'success',
                'status' => 200
            ]);
        }catch (\Exception $e){
            return response()->json($e,400);
        }
    }
}
