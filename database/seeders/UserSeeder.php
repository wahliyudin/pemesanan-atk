<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Wahliyudin',
            'email' => 'wahliyudin@gmail.com',
            'password' => Hash::make(1234567890),
            'role' => Role::BENDAHARA,
        ]);
    }
}
