<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'ismail'],
            ['email' => 'admin@gmail.com'],
            ['password' => '12345678']
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
