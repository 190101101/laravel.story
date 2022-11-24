<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('category')->insert([
            'title' => 'other',
            'slug' => 'other',
            'subtitle' => 'other category',
            'content' => $faker->text,
            'image' => $faker->imageUrl(800, 400, 'cats', true, 'Faker'),
            'delete' => 0,
        ]);

        for($i = 0; $i < 5; $i++){
            $title = $faker->sentence(1);
            $subtitle = $faker->sentence(3);
            
            DB::table('category')->insert([
                'title' => $title,
                'slug' => Str::slug($title, '-'),
                'subtitle' => $subtitle,
                'content' => $faker->text,
                'image' => $faker->imageUrl(800, 400, 'cats', true, 'Faker'),
            ]);    
        }
    }
}
