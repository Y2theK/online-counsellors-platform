<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Question;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\UserDetailSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //for my admin and counsellor
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('asdfasdf'),
            'is_admin' => true
        ]);
        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('asdfasdf'),
            'is_admin' => false
        ]);
      
        DB::table('user_details')->insert([
            'user_id' => 1,
            'age' => 20,
            'gender' =>'female',
            'field' => 'web',
            'profession' => 'backend dev',
            'experience' => 4,
            'hobby' =>'swim',
        ]);
        DB::table('user_details')->insert([
            'user_id' => 2,
            'age' => rand(18, 60),
            'gender' =>'male',
            'field' => 'tech',
            'profession' => ' dev',
            'experience' => 3,
            'hobby' =>'code',
        ]);
        //factories and seeder u can call if you want
        $this->call(UserDetailSeeder::class);
        \App\Models\User::factory(50)->create();
        \App\Models\Question::factory(10)->create();
        \App\Models\Appointment::factory(20)->create();
    }
}
