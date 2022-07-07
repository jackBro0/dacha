<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use function Symfony\Component\VarDumper\Dumper\esc;

class AuthController extends Controller
{
    public function apiLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|digits:12',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
//        $request->validate([
//            'phone' => 'required|numeric|digits:12',
//            'password' => 'required|min:6',
//        ]);

        $data = $request->only('phone', 'password');

        if (Auth::attempt(['phone' => $data['phone'], 'password' => $data['password']])) {
            $token = $request->user()->createToken('user-token', ['user']);
            return ['token' => $token->plainTextToken, 'user' => Auth::user()];
        } else {
            return response('Authentication failed', 401);
        }
    }

    public function register(Request $request)
    {
//        $request->validate([
//            'phone' => 'required|numeric|digits:12|unique:users',
//            'name' => 'required',
//            'password' => 'required|min:6'
//        ]);

        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|digits:12|unique:users',
            'name' => 'required',
            'password' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        User::query()->create(
            [
                'role_id' => User::role_user,
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
            ]
        );

        $data = $request->only('phone', 'password');

        if (Auth::attempt(['phone' => $data['phone'], 'password' => $data['password']])) {
            $token = $request->user()->createToken('user-token', ['user']);
            return ['token' => $token->plainTextToken];
        } else {
            return response('Authentication failed', 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return true;
    }

    public function user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|digits:12',
            'name' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,gif',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = Auth::user();
        if(!empty($request->photo)){
            $file = $request->file('photo');
            $file_path = "storage/" . Storage::disk('public')->put("users", $file);
        } else {
            $file_path = $user->photo;
        }
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->photo = $file_path;
        $user->update();
        return response()->json([
            'user' => Auth::user()
        ]);
    }
}
