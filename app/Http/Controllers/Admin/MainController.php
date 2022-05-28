<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dacha;
use App\Models\RentDacha;
use App\Models\User;
use App\Models\UserPaymentHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        $dacha_count = Dacha::query()->count();
        $location_count = Category::query()->count();
        $orders_count = RentDacha::query()->count();
        $admins_count = User::query()->count();

        $recent_dacha = Dacha::query()->orderByDesc('id')->take(8)->get();
        $recent_orders = RentDacha::query()->orderByDesc('id')->take(10)->get();
        return view('admin.pages.index',
            compact('dacha_count', 'location_count', 'orders_count', 'admins_count', 'recent_dacha', 'recent_orders'));
    }

    public function test()
    {
        $dacha_count = Dacha::query()->count();
        $location_count = Category::query()->count();
        $orders_count = RentDacha::query()->count();
        $admins_count = User::query()->count();

        $recent_dacha = Dacha::query()->orderByDesc('id')->take(8)->get();
        $recent_orders = RentDacha::query()->orderByDesc('id')->take(10)->get();
        return view('admin.pages.test',
            compact('dacha_count', 'location_count', 'orders_count', 'admins_count', 'recent_dacha', 'recent_orders'));
    }

    public function clickPrepare(Request $request): \Illuminate\Http\JsonResponse
    {
//        $token = '1926492699:AAH_XHiEx5LGOPN1qJqYeLD_8llbYfN5xDA';
//        $chat_id = '291096722';
//
//        $c = curl_init();
//
//        curl_setopt_array($c, array(
//            CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chat_id . '&text=prepare',
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => '',
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 0,
//            CURLOPT_FOLLOWLOCATION => true,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => 'GET',
//        ));
//
//        $response = curl_exec($c);
//
//        curl_close($c);
        Storage::put('file.txt', 'Your name');
        logger("{$request} gfgggggggggggggggggggggggggggggggggggggggggggggg");
        $click_trans_id = $request->click_trans_id;
        $service_id = $request->service_id;
        $click_paydoc_id = $request->click_paydoc_id;
        $merchant_trans_id = $request->merchant_trans_id;
//        $payment = Click::query()
//            ->where('merchant_trans_id', $merchant_trans_id)
//            ->where('status', Click::NEW_INVOICE)
//            ->first();
        $amount = $request->amount;
        $action = $request->action;
        $error = $request->error;
//        $error_note = $request->error_note;
//        $sign_time = $request->sign_time;
        $sign_string = $request->sign_string;

        $error_code = 0;
        $return_error_note = '';

        $payment_history = new UserPaymentHistory();
        $payment_history->click_trans_id = $click_trans_id;
        $payment_history->service_id = $service_id;
        $payment_history->merchant_trans_id = $merchant_trans_id;
        $payment_history->merchant_prepare_id = $merchant_trans_id;
        $payment_history->click_paydoc_id = $click_paydoc_id;
        $payment_history->status_error = $error;
        $payment_history->action = $action;
        $payment_history->amount = $amount;
        if ((int)$amount == 1000) {
            return response()->json(
                [
                    'click_trans_id' => $click_trans_id,
                    'merchant_trans_id' => $merchant_trans_id,
                    'merchant_prepare_id' => $merchant_trans_id,
                    'error' => 0,
                    'error_note' => '',
                ]
            );
        }
        return response()->json(
            [
                'click_trans_id' => $click_trans_id,
                'merchant_trans_id' => $merchant_trans_id,
                'merchant_prepare_id' => $merchant_trans_id,
                'error' => -2,
                'error_note' => 'Amount of money is not correct!',
            ]
        );
    }

    public function clickComplete(Request $request)
    {

//        $token = '1926492699:AAH_XHiEx5LGOPN1qJqYeLD_8llbYfN5xDA';
//        $chat_id = '291096722';
//
//        $c = curl_init();
//
//        curl_setopt_array($c, array(
//            CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chat_id . '&text=complete',
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => '',
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 0,
//            CURLOPT_FOLLOWLOCATION => true,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => 'GET',
//        ));
//
//        $response = curl_exec($c);

//        curl_close($c);
        logger("{$request->click_trans_id},
                           {$request->transaction_param} ");
        $click_trans_id = $request->click_trans_id;
        $user = DB::table('users')->where('id', $request->transaction_param)->update([
            'payment_status' => 5
        ]);

//        $service_id = $request->service_id;
//        $click_paydoc_id = $request->click_paydoc_id;
        $merchant_trans_id = $request->merchant_trans_id;
//        $user = User::query()->findOrFail($merchant_trans_id);
//        $user->payment_status = 1;
//        $user->update();
//        $payment = Click::query()
//            ->where('merchant_trans_id', $merchant_trans_id)
//            ->where('status', Click::NEW_INVOICE)
//            ->first();
//        if ($payment) {
//            $order = Order::query()->find($payment->order_id);
//            $order->status = 2;
//            $order->save();
//        }
        $amount = $request->amount;
//        $action = $request->action;
//        $error = $request->error;
//        $error_note = $request->error_note;
//        $sign_time = $request->sign_time;
//        $sign_string = $request->sign_string;


        $error_code = 0;
        $return_error_note = '';
//        if ((int)$amount == 1000) {
//            $user = DB::table('user')->where('id', $merchant_trans_id);
//            return response()->json(
//                [
//                    'click_trans_id' => $click_trans_id,
//                    'merchant_trans_id' => $merchant_trans_id,
//                    'merchant_confirm_id' => null,
//                    'error' => $error_code,
//                    'error_note' => $return_error_note,
//                ]
//            );
//        }
//        return response()->json(
//            [
//                'click_trans_id' => $click_trans_id,
//                'merchant_trans_id' => $merchant_trans_id,
//                'merchant_confirm_id' => null,
//                'error' => -1,
//                'error_note' => $return_error_note,
//            ]
//        );
    }
}
