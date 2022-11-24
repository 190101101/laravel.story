<?php

namespace App\Http\Controllers\main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\main\Contact;
use Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('main.contact.index');
    }

    public function send(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|min:11|max:30',
            'message' => 'required|min:10|max:300',
        ])->validate();

        return Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]) 
        ? back()->with('success', 'send succesfully')
        : back()->with('error', 'something wrong');
    }
}
