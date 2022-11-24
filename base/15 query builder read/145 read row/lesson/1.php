<?php 


use Illuminate\Support\Facades\DB;

$blog = DB::table('blog')
    ->where('blog_id', 3)
    ->first();

echo $blog->blog_title;
dd($blog);