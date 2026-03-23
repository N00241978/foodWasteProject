<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(3)->create(['role' => 'admin']);
        User::factory(10)->create(['role' => 'business']);
        User::factory(10)->create(['role' => 'customer']);
    }
}