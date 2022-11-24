<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\main\Category;
use App\Models\main\Article;
use App\Models\main\User;

class ProfileController extends Controller
{
    public function index()
    {
        $data['category'] = Category::where('id', '!=', 1)->get();
        $data['article'] = Article::where('user_id', Auth::user()->id)->paginate(5);
        return view('main.profile.index', compact('data'))->with('user', Auth::user());
    }

    public function user($login)
    {
        $user = User::whereLogin($login)->first() ?? abort(404);
        $data['article'] = Article::where('user_id', $user->id)->where('type', 'public')->paginate(5);
        return view('main.profile.user', compact('data'))->with('user', $user);
    }
}
