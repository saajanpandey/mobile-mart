<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'first_name' => 'test',
            'last_name' => 'user',
            'email' => 's@gmail.com',
            'password' => Hash::make('nepal'),
        ]);
    }
}
