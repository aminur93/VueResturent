<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Aminur',
            'email' => 'aminurrashid126@gmail.com',
            'password' => bcrypt('12345678'),
            
        ]);
    }
}
