<?php 


use Illuminate\Support\Facades\DB;


Schema::rename('newcourse', 'courses');
Schema::drop('courses');


/*create*/
Schema::create('blogs', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('blog_title', 50);
    $table->integer('blog_must');
    $table->timestamps();
});

//update and columns
$table->longText('blog_content');
$table->text('blog_content')->nullable();
$table->string('blog_title', 50)
$table->string('login', 50)->unique();
$table->integer('must')->unsigned()->unique();
$table->timestamps();
