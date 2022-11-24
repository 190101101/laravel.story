<?php 


use Illuminate\Support\Facades\DB;

DB::table('blog')->insert([
    'blog_title' => 'blog title 05',
    'blog_content' => 'blog content 05',
    'blog_must' => 5,
]);


DB::table('blog')->insert([
    [
        'blog_title' => 'blog title 07',
        'blog_content' => 'blog content 07',
        'blog_must' => 7,
    ],
    [
        'blog_title' => 'blog title 08',
        'blog_content' => 'blog content 08',
        'blog_must' => 8,
    ],
]);


DB::table('blog')->insertGetId([
    'blog_title' => 'blog title 09',
    'blog_content' => 'blog content 09',
    'blog_must' => 1,
]);

->get();
