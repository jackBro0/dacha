<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function apiLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|digits:12',
            'password' => 'required|min:6',
        ]);

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
        $request->validate([
            'phone' => 'required|numeric|digits:12',
            'name' => 'required',
            'password' => 'required|min:6'
        ]);

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
        $request->validate([
            'phone' => 'required|numeric|digits:12',
            'name' => 'required',
        ]);

        $user = Auth::user();
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->update();
        return response()->json([
            'user' => Auth::user()
        ]);
    }
}
