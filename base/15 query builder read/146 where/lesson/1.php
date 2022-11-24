<?php 


use Illuminate\Support\Facades\DB;

$blog = DB::table('blog')
    ->where('id', 3)
    ->first();
    ->where('id', 3)
    ->orwhere('id', 4)
    ->orwhere('id', 5)
    ->whereBetween('id', [1,4])
    ->whereNotBetween('id', [1,4])
    ->whereIn('id', [2,5])
    ->whereNotIn('id', [2,5])
    ->whereNull('blog_must')
    ->whereNotNull('blog_must')
    ->whereDate('blog_date', '2022-11-02')
    ->whereMonth('blog_date', '11')
    ->whereDay('blog_date', '02')
    ->whereTime('blog_date', '12:00:05')
    ->whereColumn('blog_title', 'blog_content')
    ->where('id', 5)->value('blog_title');
    ->find(2);
    ->pluck('blog_title');
    ->count();
    ->min('id');
    ->max('id');
    ->where('blog_title', 'blog title 01')->max('blog_must');
    ->where('blog_title', 'blog title 01')->exists('id');
    ->where('blog_title', 'blog title 01')->doesntExist('id');
    ->select('blog_title')
    ->select(['blog_title', 'blog_content'])
    ->select('blog_title as title')
    ->orderBy('user_must', 'desc')
    ->inRandomOrder()
    ->offset(1)
    ->orderBy('user_must', 'desc')->offset(1)->limit(2)

    
->get();


/*join*/
DB::table('user')
    ->join('blog', 'blog.user_id', '=', 'user.id')
    ->join('blog', 'blog.user_id', '=', 'user.id')->where('user.id', '1')
    ->join('blog', 'blog.user_id', '=', 'user.id') ->orderBy('user.user_must', 'desc') 



->get();
