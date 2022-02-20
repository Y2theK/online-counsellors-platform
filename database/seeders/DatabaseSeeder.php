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
        //for my admin and counsellors
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
        //factories and seeder u can command if you want
        $this->call(UserDetailSeeder::class);
        \App\Models\User::factory(50)->create();
        \App\Models\Question::factory(10)->create();
        \App\Models\Appointment::factory(20)->create();
    }
}
