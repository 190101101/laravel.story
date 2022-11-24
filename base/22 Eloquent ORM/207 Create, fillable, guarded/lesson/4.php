<?php 

use Illuminate\Database\Eloquent\softDeletes;

class Blog extends Model
{
    use softDeletes;
}

Schema::create('blog', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->text('blog_title', 50)->nullable();
    $table->timestamps();
    $table->softDeletes();
});

Blog::find(3)->delete();
Blog::where('id', 2)->delete();
Blog::destroy(4, 5, 6, 7);
Blog::truncate();
Blog::withTrashed()->get();
Blog::onlyTrashed()->get();
Blog::withTrashed()->restore();
Blog::where('id', 1)->restore();
Blog::destroy(7,8);
Blog::withTrashed()->where('id', 1)->forceDelete();