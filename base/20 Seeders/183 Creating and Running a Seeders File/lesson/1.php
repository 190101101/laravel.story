php artisan db:seed
<?php 

// 1
DB::table('blogs')->insert([
    'blog_title' => 'blog title 01',
    'blog_content' => 'blog content 01',
    'blog_must' => 1,
]);

// 2
DB::table('blogs')->insert([
    [
        'blog_title' => 'blog title 01',
        'blog_content' => 'blog content 01',
        'blog_must' => 1,
    ],
    [
        'blog_title' => 'blog title 02',
        'blog_content' => 'blog content 02',
        'blog_must' => 2,
    ],
]);

class DatabaseSeeder extends Seeder

  public function run()
    {
        $this->call(BlogTableSeeder::class);
    }