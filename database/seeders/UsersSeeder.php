<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => 'Foodie',
            "email" => 'foodie@fast-food.store',
            "address" => 'Smakoszowo',
            "password" => Hash::make('Tv3SH6a0OphS'),
            "phone" => "111222333",
        ]);
    }
}
