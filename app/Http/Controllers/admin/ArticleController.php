<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Article;
use App\Models\admin\Category;
use Illuminate\Support\Str;
use Validator;
use DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['count'] = Article::count();
        $data['article'] = Article::orderBy('id', 'desc')->paginate(10);
        return view('admin.article.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::all();
        return view('admin.article.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'bail|required|min:2|max:100',
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
            'user_id' => $request->user_id,
        ])
            ? back()->with('success', 'created successfully')
            : back()->with('error', 'something wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id) ?? abort(404);
        return view('admin.article.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category::all();
        $article = Article::find($id) ?? abort(404);
        return view('admin.article.update', compact('data'))->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'title' => 'bail|required|min:2|max:100',
            'subtitle' => 'bail|required|min:2|max:100',
            'category_id' => 'bail|required|min:1|max:3',
            'content' => 'bail|required|min:10|max:5000',
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
        $article->user_id = $request->user_id;
        return $article->save()
            ? back()->with('success', 'created successfully')
            : back()->with('error', 'something wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $data = $article == null ? false : $article;
        echo $data->delete() ? true : false;
    }

    public function status($id)
    {
        $article = Article::find($id);
        $data = $article == null ? false : $article;
        if(!$data) return false;
        $status = $data->status == 1 ? 0 : 1;
        $data->status = $status;
        echo $data->save() ? true : false;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        Validator::make($request->only(['query']), [
            'query' => 'bail|required|alpha_dash|min:3|max:20',
        ])->validate();

        $data['article'] = Article::where(DB::raw("CONCAT (title, ' ', subtitle)"), 'LIKE', "%{$query}%")
            ->orWhere('slug', 'LIKE', "%{%query}%")->orderBy('id', 'DESC')->take(20)->get();

        if(!$data['article']->count()){
            return redirect()->route('article.index')
                ->with('error', 'nothing found by search');
        }

        return view('admin.article.search', compact('data'))->with('query', $query);
    }
}

