<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckUserPaymentController extends Controller
{
    public function check(): \Illuminate\Http\JsonResponse
    {
        $user_id = Auth::id();
        $userDacha = DB::table('dacha_counts')->where('user_id', $user_id)->get();
        $countDacha = $userDacha->pluck('count_of_dacha');
        $status = $userDacha->pluck('payment_status');
        switch (true){
            case $status == 2:
                return response()->json([
                   'payment_status' => false,
                ]);
            case $status == 1:
                return response()->json([
                    'payment_status' => true,
                ]);
        }
    }
}
