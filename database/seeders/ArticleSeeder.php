<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        for($i = 0; $i < 25; $i++){
            $title = $faker->sentence(2);
            $subtitle = $faker->sentence(3);
            
            DB::table('article')->insert([
                'title' => $title,
                'slug' => Str::slug($title, '-'),
                'subtitle' => $subtitle,
                'content' => $faker->text,
                'category_id' => rand(1, 5),
                'user_id' => rand(2, 10),
            ]);    
        }
    }
}
