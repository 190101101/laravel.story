<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Article;
use App\Models\admin\Category;
use Illuminate\Support\Str;
use Validator;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['count'] = category::count();
        $data['category'] = category::orderBy('id', 'desc')->paginate(10);
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'content' => 'bail|required|min:10|max:5000',
            'image' => 'bail|required',
        ])->validate();

        $category = category::where('slug', Str::slug($request->title, '-'))->get();

        if($category->count()){
            return back()->with('warning', 'by such a title the category exists');
        }

        return category::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'slug' => Str::slug($request->title, '-'),
            'content' => $request->content,
            'image' => $request->image,
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
        $category = category::withTrashed()->find($id) ?? abort(404);
        return view('admin.category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id) ?? abort(404);
        return view('admin.category.update')->with('category', $category);
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
            'content' => 'bail|required|min:10|max:5000',
        ])->validate();

        $category = category::where('id', $id)->first() ?? abort(404);

        $categorys = category::where('slug', Str::slug(strtolower($request->title), '-'))
            ->where('id', '!=', $category->id)->get();

        if($categorys->count()){
            return back()->with('warning', 'by such a title the category exists');
        }

        $category->title = $request->title;
        $category->subtitle = $request->subtitle;
        $category->slug = Str::slug($request->title, '-');
        $category->content = $request->content;
        return $category->save()
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
        $category = Category::where('id', $id)->where('delete', 1)->first();

        if(!$category){
            echo false;
        }

        $article = Article::where('category_id', $category->id)->get();

        if($article){
            $arr = collect($article);
            $plucked = $arr->pluck('category_id');
            
            Article::whereIn('category_id', $plucked->all())->update([
                'category_id' => 1
            ]);
        }

        echo Category::where('id', $category->id)->delete() ? true : false;
    }

    public function status($id)
    {
        $category = category::find($id);
        $data = $category == null ? false : $category;
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

        $data['category'] = category::where(DB::raw("CONCAT (title, ' ', subtitle)"), 'LIKE', "%{$query}%")
            ->orWhere('slug', 'LIKE', "%{%query}%")->orderBy('id', 'DESC')->take(20)->get();

        if(!$data['category']->count()){
            return redirect()->route('category.index')
                ->with('error', 'nothing found by search');
        }

        return view('admin.category.search', compact('data'))->with('query', $query);
    }
}

