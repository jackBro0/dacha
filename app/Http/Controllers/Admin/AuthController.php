<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);
        $data = $request->only('phone', 'password');

        if (Auth::attempt(['phone' => $data['phone'], 'password' => $data['password']]) and Auth::user()->role_id == User::role_admin) {
            return redirect()->route('adminPanel');
        } else {
            return redirect()->back()->withErrors(['fail' => 'login or password invalid']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function password()
    {
        return view('admin.pages.password.index');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required',
            'confirm' => 'required | same:password',
        ]);
        return redirect()->back();
    }
}
