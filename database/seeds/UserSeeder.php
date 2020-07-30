<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 5)->create();
        \App\User::create([
            'name' => 'Alfarel',
            'email' => 'alfarelrizky99@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Cryptonesia22'),
            'photo' => 'logo/logo-simple-navbar.png',
            'level' => 'admin'
        ]);
    }
}
