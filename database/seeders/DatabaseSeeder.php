<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Sergio',
            'email' => 'sergio.reyes@insbaixcamp.cat',
            'password' => bcrypt('39942442'),
        ]);

        // Llamar al CategorySeeder
        $this->call([
            CategorySeeder::class,
            GameSeeder::class,
        ]);
    }
}

