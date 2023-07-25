<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {

        $users = [

            [

                'name' => 'Administrator',

                'email' => 'admindialog@sayuru.com',

                'type' => 1,

                'password' => bcrypt('hWp4aY8uLvSrw!a)DD'),

            ]

        ];



        foreach ($users as $key => $user) {

            User::create($user);
        }
    }
}
