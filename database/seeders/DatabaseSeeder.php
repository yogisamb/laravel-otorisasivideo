<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\User_role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678i'),
            'user_role_id' => '1',
            'is_active' => '1'
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678i'),
            'user_role_id' => '2',
            'is_active' => '1'
        ]);

        User_role::create([
            'user_role_title' => 'admin',
        ]);

        User_role::create([
            'user_role_title' => 'user',
        ]);
    }
}
