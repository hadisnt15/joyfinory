<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Dini Nadia',
            'email' => 'dini@gmail.com',
            'password' => Hash::make('10012001'),
        ]);
        User::factory()->create([
            'name' => 'Hadi Santoso',
            'email' => 'hadi@gmail.com',
            'password' => Hash::make('10012001'),
        ]);
    }
}
