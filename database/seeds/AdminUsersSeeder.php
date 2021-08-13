<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phonenumber' => '0000000000',
            'password' => \Hash::make('Admin@123'),
        ]);
    }
}
