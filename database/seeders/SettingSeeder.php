<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            [
                'description' => 'title',
                'key' => 'title',
                'value' => 'Blog | True Story',
                'type' => 'text',
            ],
            [
                'description' => 'description',
                'key' => 'description',
                'value' => 'description text',
                'type' => 'text',
            ],
            [
                'description' => 'keyword',
                'key' => 'keyword',
                'value' => 'php, javascript, python',
                'type' => 'text',
            ],
            [
                'description' => 'author',
                'key' => 'author',
                'value' => 'author text',
                'type' => 'text',
            ],
            [
                'description' => 'copyright',
                'key' => 'copyright',
                'value' => 'Copyright © Your Website 2022',
                'type' => 'text',
            ],
            [
                'description' => 'twitter',
                'key' => 'twitter',
                'value' => 'twitter',
                'type' => 'twitter',
            ],
            [
                'description' => 'github',
                'key' => 'github',
                'value' => 'github',
                'type' => 'github',
            ],
        ]);
    }
}
