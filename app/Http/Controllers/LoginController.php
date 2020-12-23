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
            'email'     =>  $request->email,
            'password'  =>  $request->password,
        ];
        // $data['password'] = bcrypt($data['password']);
        // dd($data['password']);

        if (Auth::attempt($data)) {
            echo('ok');
        } else {
            echo('no');
        }
    }
}
