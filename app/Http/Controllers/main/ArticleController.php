<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\main\Article;
use App\Models\main\Category;
use App\Models\main\User;
use Illuminate\Support\Str;
use Validator;

class ArticleController extends Controller
{
    public function index($cslug, $aslug)
    {
        $category = Category::where('id', '!=', 1)
            ->whereSlug($cslug)->whereStatus(1)->first() 
                ?? abort(404, 'category not found');

        $article = Article::where('slug', $aslug)->where('type', 'public')
            ->where('category_id', $category->id)->first()
                ?? abort(404, 'category not found');

        $article->increment('hit');
        
        $data['category'] = Category::where('id', '!=', 1)->whereStatus(1)->get();

        return view('main.article.index', compact('data'))->with('article', $article);
    }

    public function create(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'bail|required|min:2|max:50',
            'subtitle' => 'bail|required|min:2|max:100',
            'category_id' => 'bail|required|min:1|max:3',
            'content' => 'bail|required|min:10|max:5000',
        ])->validate();

        $article = Article::where('slug', Str::slug($request->title, '-'))->get();

        if($article->count()){
            return back()->with('warning', 'by such a title the article exists');
        }

        return Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'slug' => Str::slug($request->title, '-'),
            'category_id' => $request->category_id,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'type' => $request->type,
        ])
            ? back()->with('success', 'created successfully')
            : back()->with('error', 'something wrong');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $data = $article == null ? false : $article;

        return $data->delete()
            ? back()->with('success', 'created successfully')
            : back()->with('error', 'something wrong');
    }

    public function edit($id)
    {
        $data['category'] = Category::where('id', '!=', 1)->whereStatus(1)->get();
        $article = Article::where('id', $id)->where('user_id', Auth::user()->id)->first() 
            ?? abort(404, 'category not found');
        return view('main.article.edit', compact('data'))
            ->with('article', $article);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'title' => 'bail|required|min:2|max:100',
            'subtitle' => 'bail|required|min:2|max:100',
            'category_id' => 'bail|required|min:1|max:3',
            'content' => 'bail|required|min:10|max:5000',
            'type' => 'bail|required|alpha',
        ])->validate();

        $article = Article::where('id', $id)->first() ?? abort(404);

        $articles = Article::where('slug', Str::slug(strtolower($request->title), '-'))
            ->where('id', '!=', $article->id)->get();

        if($articles->count()){
            return back()->with('warning', 'by such a title the article exists');
        }

        $article->title = $request->title;
        $article->subtitle = $request->subtitle;
        $article->slug = Str::slug($request->title, '-');
        $article->category_id = $request->category_id;
        $article->content = $request->content;
        $article->user_id = Auth::user()->id;
        $article->type = $request->type;
        return $article->save()
            ? back()->with('success', 'created updated')
            : back()->with('error', 'something wrong');
    }
}
