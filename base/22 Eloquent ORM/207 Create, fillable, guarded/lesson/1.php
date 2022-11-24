<?php 

class Blog extends Model
{
    protected $fillable = ['blog_title','blog_content','blog_must'];
    protected $guarded = ['blog_must'];
}

Blog::create([
    'blog_title' => 'blog title 01',
    'blog_content' => 'blog content 01',
    'blog_must' => 3,
]);