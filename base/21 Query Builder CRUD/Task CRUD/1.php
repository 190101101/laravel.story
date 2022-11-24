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

        $status = DB::Table('blogs')->insert([
            'blog_title' => $request->blog_title,
            'blog_content' => $request->blog_content,
            'blog_must' => $request->blog_must,
        ]);

        return back()->with('status', 'created success');
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
        $blog = DB::Table('blogs')->find($id);

        if($blog){
            return view('edit')->with('blog', $blog);
        }else{
            return back();
        }
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
        $blog = DB::Table('blogs')->find($id);
        $blog ?: back();

        $request->validate([
            'blog_title' => 'required',
            'blog_content' => 'required',
            'blog_must' => 'required',
        ]);

        DB::Table('blogs')->where('id', $id)->update([
            'blog_title' => $request->blog_title,
            'blog_content' => $request->blog_content,
            'blog_must' => $request->blog_must,
        ]);

        return back()->with('status', 'created success');
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
        return back();
    }

    public function truncate()
    {
        $blogs = DB::Table('blogs')->truncate();
        return back();
    }
}
