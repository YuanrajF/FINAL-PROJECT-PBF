<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        //
        User::create([
            "username"=> "Administrator",
            "email"=> "admin@gmail.com",
            "password"=> Hash::make("admin"),
            "no_hp"=> "08121212612"
        ]);
    }
}
