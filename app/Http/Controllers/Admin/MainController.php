<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dacha;
use App\Models\RentDacha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index() {
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

    public function clickPrepare(Request $request)
    {
        $token = '1926492699:AAH_XHiEx5LGOPN1qJqYeLD_8llbYfN5xDA';
        $chat_id = '291096722';

        $c = curl_init();

        curl_setopt_array($c, array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chat_id . '&text=prepare',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($c);

        curl_close($c);

        $click_trans_id = $request->click_trans_id;
//        $service_id = $request->service_id;
//        $click_paydoc_id = $request->click_paydoc_id;
        $merchant_trans_id = $request->transaction_param;
//        $payment = Click::query()
//            ->where('merchant_trans_id', $merchant_trans_id)
//            ->where('status', Click::NEW_INVOICE)
//            ->first();
//        $amount = $request->amount;
//        $action = $request->action;
//        $error = $request->error;
//        $error_note = $request->error_note;
//        $sign_time = $request->sign_time;
        $sign_string = $request->sign_string;

        $error_code = 0;
        $return_error_note = '';

        return response()->json(
            [
                'click_trans_id' => $click_trans_id,
                'transaction_param' => $merchant_trans_id,
                'merchant_prepare_id' => $merchant_trans_id,
                'error' => 0,
                'error_note' => '',
            ]
        );
    }

    public function clickComplete(Request $request)
    {

        $token = '1926492699:AAH_XHiEx5LGOPN1qJqYeLD_8llbYfN5xDA';
        $chat_id = '291096722';

        $c = curl_init();

        curl_setopt_array($c, array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/sendMessage?chat_id=' . $chat_id . '&text=complete',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($c);

        curl_close($c);
        $click_trans_id = $request->click_trans_id;
//        $service_id = $request->service_id;
//        $click_paydoc_id = $request->click_paydoc_id;
        $merchant_trans_id = $request->transaction_param;
        $user = User::query()->findOrFail($merchant_trans_id);
        $user->payment_status = 1;
        $user->update();
//        $payment = Click::query()
//            ->where('merchant_trans_id', $merchant_trans_id)
//            ->where('status', Click::NEW_INVOICE)
//            ->first();
//        if ($payment) {
//            $order = Order::query()->find($payment->order_id);
//            $order->status = 2;
//            $order->save();
//        }
//        $amount = $request->amount;
//        $action = $request->action;
//        $error = $request->error;
//        $error_note = $request->error_note;
//        $sign_time = $request->sign_time;
//        $sign_string = $request->sign_string;


        $error_code = 0;
        $return_error_note = '';

        return response()->json(
            [
                'click_trans_id' => $click_trans_id,
                'transaction_param' => $merchant_trans_id,
                'merchant_confirm_id' => null,
                'error' => $error_code,
                'error_note' => $return_error_note,
            ]
        );
    }
}
