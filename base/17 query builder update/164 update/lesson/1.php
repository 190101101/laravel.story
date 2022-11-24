<?php 


use Illuminate\Support\Facades\DB;

$blog = DB::table('blog')

//
->where('id', 13)
->update([
    'blog_title' => 'blog title 09',
    'blog_content' => 'blog content 09',
    'blog_must' => 3,
]);

//
->where('id', 13)
->update([
    'blog_must' => 7,
]);

//
->updateOrInsert(
    [
        'blog_title' => 'blog title 32',
    ],
    [
        'blog_title' => 'blog title 32',
        'blog_must' => 22
    ]
);


// 
->where('id', 2)->increment('blog_must', 2);
->where('id', 2)->decrement('blog_must', 2);

->get();
