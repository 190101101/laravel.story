<?php 

use App\Mail\Send;
use Illuminate\Support\Facades\Mail;

class CodeController extends Controller
{
    public function index()
    {
        return view('code');
    }

    public function mail()
    {
        return view('mail');
    }

    public function send(Request $request)
    {
        $data = $request->only('email', 'text');
        
        Mail::to($request->email)->send(new Send($data));
        return back()->with('success', 'mail sended');
    }
}
