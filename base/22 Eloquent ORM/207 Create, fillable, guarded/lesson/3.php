<?php 

//
$blog = Blog::find(2);
$blog->blog_title = 'blog title 10';
$blog->save();

//
Blog::where('id', 2)->update([
    'blog_title' => 'blog title 10',
]);
