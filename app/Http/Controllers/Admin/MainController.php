<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dacha;
use App\Models\PaymeInfo;
use App\Models\PaymentUser;
use App\Models\RentDacha;
use App\Models\User;
use App\Models\UserPaymentHistory;
use Carbon\Carbon;
use DateTime;
use http\Env\Response;
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
//        Storage::put('file.txt', 'Your name');
        logger("Prepare: {$request}");
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
        $payment_history->save();
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

    public function clickComplete(Request $request): \Illuminate\Http\JsonResponse
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
        logger("Complete:  {$request}");

//        $service_id = $request->service_id;
        $click_trans_id = $request->click_trans_id;
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
        if ((int)$amount == 1000) {
            DB::table('users')->where('id', $merchant_trans_id)->update([
                'payment_status' => 1
            ]);
            return response()->json(
                [
                    'click_trans_id' => $click_trans_id,
                    'merchant_trans_id' => $merchant_trans_id,
                    'merchant_confirm_id' => null,
                    'error' => $error_code,
                    'error_note' => $return_error_note,
                ]
            );
        }
        return response()->json(
            [
                'click_trans_id' => $click_trans_id,
                'merchant_trans_id' => $merchant_trans_id,
                'merchant_confirm_id' => null,
                'error' => -1,
                'error_note' => $return_error_note,
            ]
        );
    }

    public function paymeAuth(Request $request)
    {
        $id = !empty($request->id) ? $request->id : null;
        $method = $request['method'];
        $transaction_id = !empty($request->params["id"]) ? $request->params["id"] : null;
        $time = !empty($request->params["time"]) ? $request->params["time"] : null;
        $reason = !empty($request->params["reason"]) ? $request->params["reason"] : null;
        $amount = !empty($request->params["amount"]) ? $request->params["amount"] : 0;
        $user = !empty($request->params["account"]) ? User::query()->where('id', $request->params["account"]["user_id"])->get()->pluck("id") : null;
        $user_get = !empty($request->params["account"]) ? User::query()->where('id', $request->params["account"]["user_id"])->first() : null;
        $account_phone = !empty($request->params["account"]) ? $request->params["account"] : null;
        $user_transaction = DB::table("payme_infos")
            ->where("transaction_id", $transaction_id)
            ->count();
        $rr = $request->headers;
        $test_key = '';
        foreach ($rr as $r) {
            if ($r[0] == "eJ1N?5RepNeR?VqkmesACpfti%9FeHa3SA?A") {
                $test_key = "eJ1N?5RepNeR?VqkmesACpfti%9FeHa3SA?A";
            };
        }
        if (!$user_get and !$user_transaction and $test_key != "eJ1N?5RepNeR?VqkmesACpfti%9FeHa3SA?A") {
            return response()->json([
                'error' => [
                    "code" => -32504,
                    "message" => [
                        "uz" => "Ro'yxatdan o'ting",
                        "ru" => "Ro'yxatdan o'ting",
                        "en" => "Ro'yxatdan o'ting",
                    ],
                    "data" => "auth"
                ],
                "id" => $id
            ]);
        }

        if ((!$user_get and $amount != 100000 and $method != "CheckTransaction" and $user_transaction == 0) or (!$user_get and $amount == 10000 and $method != "CheckTransaction" and $user_transaction == 0)) {
            return response()->json([
                'error' => [
                    "code" => -31099,
                    "message" => [
                        "ru" => "?????????????????????? ???? ????????????",
                        "uz" => "foydalanuvchi topilmadi",
                        "en" => "user not found"
                    ],
                    "data" => "amount",
                    "transaction_id" => (int)$transaction_id,
                ],
                "id" => $id
            ]);
        }

        if ($amount != 100000 and !$user_transaction) {
            return response()->json([
                'error' => [
                    "code" => -31001,
                    "message" => [
                        "uz" => "To'lov summasi xato kirirtildi!!!",
                        "ru" => "To'lov summasi xato kirirtildi!!!",
                        "en" => "To'lov summasi xato kirirtildi!!!",
                    ],
                    "data" => "amount"
                ],
                "id" => $id
            ]);
        }
//        if (!$user and $method == "CheckPerformTransaction") {
//            return response()->json([
//                'error' => [
//                    "code" => -31099,
//                    "message" => [
//                        "ru" => "?????????????????????? ???? ????????????",
//                        "uz" => "foydalanuvchi topilmadi",
//                        "en" => "user not found"
//                    ],
//                    "data" => "amount",
//                    "transaction_id" => (int)$transaction_id,
//                ],
//                "id" => $id
//            ]);
//        }
        if ($method == "CheckPerformTransaction" and $user) {
            return response()->json([
                "result" => [
                    "allow" => true
                ]
            ]);
        }


        if ($method == "CreateTransaction") {
            $ret = DB::table("payme_infos")
                ->where("user_id", $user[0])
                ->where("transaction_id", $transaction_id)
                ->count();
            $user_transaction = DB::table("payme_infos")
                ->where("user_id", $user[0])
                ->first();
//            dd($ret);
//            dd($transaction_id, $user_transaction->transaction_id, $ret_count);

            if ($ret > 0) {
                return response()->json([
                    "result" => [
                        "create_time" => $time,
                        "transaction" => $transaction_id,
                        "state" => 1,
                    ]
                ]);
            }
            if (!empty($user_transaction->state) and !$ret and $user_transaction->state) {
                return response()->json([
                    'error' => [
                        "code" => -31050,
                        "message" => [
                            "uz" => "ID",
                            "ru" => "ID",
                            "en" => "ID",
                        ],
                        "current_id" => $transaction_id
                    ],
                    "saved_id" => $user_transaction->transaction_id
//                    'result' => [
//                        "create_time" => (int)$user_transaction->time,
//                        "transaction" => $user_transaction->transaction_id,
//                        "state" => $user_transaction->state,
//                        "receivers" => null
//                    ]
                ]);
            }
            $payInfo = new PaymeInfo();
            $payInfo->user_id = $user[0];
            $payInfo->amount = $amount;
            $payInfo->transaction_id = $transaction_id;
            $payInfo->time = $time;
            $payInfo->state = 1;
            $payInfo->save();
            return response()->json([
                "result" => [
                    "create_time" => $time,
                    "transaction" => $transaction_id,
                    "state" => 1,
                ]
            ]);

        }

        if ($method == "PerformTransaction") {
            $user_transaction = DB::table("payme_infos")
                ->where("transaction_id", $transaction_id)
                ->first();
            if ($user_transaction->state == 2) {
                return response()->json([
                    "result" => [
                        "perform_time" => (int)$user_transaction->perform_time,
                        "transaction" => $transaction_id,
                        "state" => $user_transaction->state
                    ]
                ]);
            }
            $now = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
            $now_us = (int)$now->format('Uv');
            $status = DB::table("payme_infos")->where("transaction_id", $transaction_id)->update([
                "state" => 2,
                "perform_time" => $now_us
            ]);
            $user_transaction = DB::table("payme_infos")
                ->where("transaction_id", $transaction_id)
                ->first();

            return response()->json([
                "result" => [
                    "perform_time" => (int)$user_transaction->perform_time,
                    "transaction" => $transaction_id,
                    "state" => $user_transaction->state
                ]
            ]);
        }

        if ($reason) {
            $user_transaction = DB::table("payme_infos")
                ->where("transaction_id", $transaction_id)
                ->first();
            if ($user_transaction->state == -1) {
                return response()->json([
                    "result" => [
                        "cancel_time" => (int)$user_transaction->cancel_time,
                        "transaction" => $transaction_id,
                        "state" => $user_transaction->state
                    ]
                ]);
            }
            $now = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
            $now_us = (int)$now->format('Uv');
            $status = DB::table("payme_infos")->where("transaction_id", $transaction_id)->update([
                "state" => -1,
                "cancel_time" => $now_us
            ]);
            $user_transaction = DB::table("payme_infos")
                ->where("transaction_id", $transaction_id)
                ->first();
            return response()->json([
                "result" => [
                    "cancel_time" => (int)$user_transaction->cancel_time,
                    "transaction" => $transaction_id,
                    "state" => $user_transaction->state
                ]
            ]);
        }

        if ($method == "CheckTransaction") {
            $user_transaction = DB::table("payme_infos")
                ->where("transaction_id", $transaction_id)
                ->first();

            if ($user_transaction->state == 1) {
                return response()->json([
                    "result" => [
                        "create_time" => (int)$user_transaction->time,
                        "perform_time" => 0,
                        "cancel_time" => 0,
                        "transaction" => $transaction_id,
                        "state" => 1,
                        "reason" => null
                    ],
                    "error" => null
                ]);
            }
            if ($user_transaction->state == 2) {
                return response()->json([
                    "result" => [
                        "create_time" => (int)$user_transaction->time,
                        "perform_time" => (int)$user_transaction->perform_time,
                        "cancel_time" => 0,
                        "transaction" => $transaction_id,
                        "state" => $user_transaction->state,
                        "reason" => null
                    ],
                    "error" => null
                ]);
            }
            return response()->json([
                "result" => [
                    "create_time" => (int)$user_transaction->time,
                    "perform_time" => (int)$user_transaction->perform_time,
                    "cancel_time" => (int)$user_transaction->cancel_time,
                    "transaction" => $transaction_id,
                    "state" => $user_transaction->state,
                    "reason" => 3
                ],
                "error" => null
            ]);
        }
    }

    public function apelsinEndpoint(Request $request)
    {
        logger("Prepare: {$request}");
        $transactionId = $request->transactionId;
        $amount = $request->amount;
        $userid = $request->userid;
        $user = User::query()->find($userid);

        if ($amount != 100000 or !$user) {
            return response([
                'status' => false
            ]);
        }

        PaymentUser::query()->create(
            [
                'user_id' => $user->id,
                'transaction_id' => $transactionId,
                'amount' => $amount,
                'payment_type' => PaymentUser::APELSIN
            ]
        );

        $user->payment_status = 1;
        $user->save();
        return response([
            'status' => true
        ]);

    }
}
