<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'login' => 'apsi',
            'password' => bcrypt('111'),
            'type' => 'admin',
        ]);

        $faker = \Faker\Factory::create();
        
        for($i = 0; $i < 10; $i++){
            DB::table('user')->insert([
                'login' => $faker->userName(),
                'password' => $faker->password(),
                'password' => bcrypt($faker->password()),
                'password' => $faker->password(),
            ]);
        }
    }
}
