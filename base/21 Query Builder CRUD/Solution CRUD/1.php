<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = DB::Table('blogs')->get();
        return view('blog')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_content' => 'required',
            'blog_must' => 'required',
        ]);

        $data = $request->all();

        DB::Table('blogs')->insert([
            'blog_title' => $data['blog_title'],
            'blog_content' => $data['blog_content'],
            'blog_must' => $data['blog_must'],
        ]);

        return redirect('blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = DB::Table('blogs')->where('id', $id)->first();
        return view('edit')->with('blog', $blog);
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
        $request->validate([
            'blog_title' => 'required',
            'blog_content' => 'required',
            'blog_must' => 'required',
        ]);

        $data = $request->all();

        DB::Table('blogs')->where('id', $id)->update([
            'blog_title' => $data['blog_title'],
            'blog_content' => $data['blog_content'],
            'blog_must' => $data['blog_must'],
        ]);

        return redirect('blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = DB::Table('blogs')->where('id', $id)->delete();
        return redirect('blog');
    }

    public function truncate()
    {
        $blogs = DB::Table('blogs')->truncate();
        return redirect('blog');
    }
}
