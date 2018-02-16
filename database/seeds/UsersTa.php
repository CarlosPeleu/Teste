<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Carlos Peleu',
            'email' => 'carlos.peleu@gmail.com',
            'password' => bcrypt(123456),
        ]);

        User::create([
            'name' => 'Dominic Toretto',
            'email' => 'dominic@gmail.com',
            'password' => bcrypt(123456),
        ]);
    }
}
