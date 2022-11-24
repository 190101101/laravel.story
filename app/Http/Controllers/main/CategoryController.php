<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\main\Article;
use App\Models\main\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data['category'] = Category::where('id', '!=', 1)->whereStatus(1)->paginate(10);
        return view('main.category.index', compact('data'));
    }

    public function articles($slug)
    {
        $category = Category::where('id', '!=', 1)
            ->whereSlug($slug)->whereStatus(1)->first()
                ?? abort(404, 'category not found');

        $data['article'] = Article::where('category_id', $category->id)->paginate(5)
                ?? abort(404, 'category not found');
        
        $data['category'] = Category::where('id', '!=', 1)->whereStatus(1)->get();

        return view('main.category.articles', compact('data'))
            ->with('category', $category);
    }
}
