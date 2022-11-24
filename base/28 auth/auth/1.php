<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\models\admin\User;
use Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.index');
    }

    public function auth(Request $request)
    {
        $request->flash();

        Validator::make($request->all(), [
            'login' => 'required|min:3|max:20',
            'password' => 'required|min:3|max:20',
        ])->validate();

        $remember = $request->has('remember') ? true : false;

        return Auth::attempt([
            'login' => $request->login,
            'password' => $request->password,
        ], $remember)
            ? redirect()->intended('admin/panel')->with('success', 'log in succesfully')
            : back()->with('error', 'user not found');
    }
}
 
