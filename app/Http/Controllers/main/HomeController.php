<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\main\Article;
use App\Models\main\Category;

class HomeController extends Controller
{
    public function index()
    {
        $data['category'] = Category::where('id', '!=', 1)->get();
        $data['article'] = Article::orderBy('id', 'desc')->where('type', 'public')->paginate(5);

        return view('main.home.index', compact('data'));
    }

    public function about()
    {
        return view('main.home.about');
    }
}
