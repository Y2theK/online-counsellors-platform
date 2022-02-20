<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        for ($i = 1;$i <= 50;$i++) {
            DB::table('user_details')->insert([
                'user_id' => $i,
                'age' => rand(18, 60),
                'gender' => $faker->randomElement(['male', 'female', 'other']),
                'field' => $faker->randomElement(['bitcoin','web','tech', 'marketing','hr','caerrer','basic','hacking']),
                'profession' => $faker->randomElement(['backend dev','web dev','javascript dev','junior dev','php laravel dev','senior dev']),
                'experience' => rand(1, 10),
                'hobby' => $faker->randomElement(['swim','code','music','sport','football','badminton']),
            ]);
        }
    }
}
