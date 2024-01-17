<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::firstOrCreate(
            ['email' => 'huy@gmail.com'],
            [
                'name' => 'adminUser',
                'password' => bcrypt('admin'),
                'admin' => 1,
            ]
        );

        // Nếu user đã tồn tại, cập nhật lại trường admin
        if (!$adminUser->wasRecentlyCreated) {
            $adminUser->admin = 1;
            $adminUser->save();
        }

        // Tạo user thông thường
        $normalUser = User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'user',
                'password' => bcrypt('user'),
                'admin' => 0,
            ]
        );
    }
}
