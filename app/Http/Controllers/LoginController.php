<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function checkLogin(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data, true)) {
            $request->session()->put('username', $data['email']);
            $request->session()->flash('infoMessage', trans('user.login_success'));

            return redirect()->route('user.index');
        } else {
            $request->session()->flash('infoMessage', trans('user.login_fail'));

            return redirect()->route('login-form');
        }
    }

    public function logOut()
    {
        Auth::logout();

        return redirect()->route('login-form');
    }
}
