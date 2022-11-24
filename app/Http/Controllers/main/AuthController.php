<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\main\User;
use Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('main.auth.index');
    }

    public function login(Request $request)
    {
        $request->flash();

        Validator::make($request->all(), [
            'login' => 'required|min:2|max:20',
            'password' => 'required|min:2|max:20',
        ])->validate();

        if (Auth::attempt([
            'login' => $request->login, 
            'password' => $request->password,
        ], $request->has('remember'))){
            return redirect()->route('home')->with('success', 'log in succesfully');
        }else{
            return back()->with('error', 'user not found');
        }
    }

    public function register()
    {
        return view('main.auth.register');
    }

    public function signUp(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|unique:user|alpha_dash|max:25|min:3',
            'password' => 'required|min:3|max:25',
        ]);

        return User::create([
            'login' => $request->login,
            'password' => bcrypt($request->password),
        ])
        ? redirect()->route('auth.login')->with('success', 'registered succesfully')
        : back()->with('error', 'something wrong');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'you are logouted');
    }
}
