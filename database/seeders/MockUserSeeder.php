<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class MockUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'id' => '00000000-0000-0000-0000-000000000001',
            'name' => 'Rai Dev User',
            'email' => 'rai@whenkaya.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'id' => '00000000-0000-0000-0000-000000000002',
            'name' => 'Rai Dev Admin 1',
            'email' => 'adminRai@whenkaya.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
