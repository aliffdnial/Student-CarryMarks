<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin: userLevel =0, lecturer: userLevel=3, student: userLevel=5
        $users = [
            [
            'name'=>'Admin User',
            'email'=>'admin@uniten.edu.my',
            'password'=> bcrypt('password'),
            'user_level' => 0
            ],
            [
            'name'=>'Lecturer User',
            'email'=>'lecturer1@uniten.edu.my',
            'password'=> bcrypt('password'),
            'user_level' => 3
            ],
            [
            'name'=>'Student User',
            'email'=>'student1@uniten.edu.my',
            'password'=> bcrypt('password'),
            'user_level' => 5
            ],
            ];
            // foreach item in the $users array (above), create user
            foreach ($users as $key => $user) {
                User::create($user);
            }
    }
}
