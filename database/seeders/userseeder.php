<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
          [
            "name"=> 'Admin',
            "email" => 'admin@gmail.com',
            "password"=> bcrypt('admin'),
            'is_admin'=> 1,
          ],
          [
            "name"=> 'User',
            "email" => 'user@gmail.com',
            "password"=> bcrypt('user'),
            'is_admin'=> 0,
          ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
