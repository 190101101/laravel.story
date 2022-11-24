<?php 

//
Blog::create([
    'blog_title' => 'blog title 01',
    'blog_content' => 'blog content 01',
    'blog_must' => 3,
]);

//
Blog::firstOrCreate([
    'blog_title' => 'blog title 01',
    'blog_content' => 'blog content 01',
    'blog_must' => 3,
]);

//
$blog = Blog::firstOrNew([
    'blog_title' => 'blog title 01',
    'blog_content' => 'blog content 01',
    'blog_must' => 3,
]);

echo $blog->exists;
$blog->save();
