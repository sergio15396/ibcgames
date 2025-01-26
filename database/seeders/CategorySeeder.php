<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Action', 'slug' => 'action', 'description' => 'Fast-paced games that require quick reflexes and hand-eye coordination.'],
            ['name' => 'Adventure', 'slug' => 'adventure', 'description' => 'Games that involve exploration and puzzle-solving in immersive worlds.'],
            ['name' => 'RPG', 'slug' => 'rpg', 'description' => 'Role-playing games where players assume the roles of characters in a fictional setting.'],
            ['name' => 'Shooter', 'slug' => 'shooter', 'description' => 'Games focused on shooting enemies and completing missions.'],
            ['name' => 'Sports', 'slug' => 'sports', 'description' => 'Games that simulate real-world sports and competitions.'],
            ['name' => 'Simulation', 'slug' => 'simulation', 'description' => 'Games that mimic real-life activities and scenarios.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
