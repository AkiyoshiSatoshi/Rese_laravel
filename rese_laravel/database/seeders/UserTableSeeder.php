<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin1234'),
            'access_auth' => 9,
        ]);
        User::create([
            'name' => 'Representative',
            'email' => 'repre@repre.com',
            'password' => Hash::make('repre1234'),
            'access_auth' => 1,
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('user1234'),
            'access_auth' => 0,
        ]);
    }
}
