<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Spark;
use Illuminate\Database\Seeder;

class SparkSeeder extends Seeder
{
    public function run(): void
    {
        // Create predefined categories
        $categories = [
            'Tech',
            'Art',
            'Business',
            'Life Hacks',
            'Random',
            'Science',
            'Education',
            'Health & Wellness',
            'Productivity',
            'Environment',
            'AI & Automation',
            'Design',
            'Gaming',
            'Philosophy',
            'Social Impact',
            'Startups',
            'Weird Inventions',
            'Unsolved Problems',
            'Space & Exploration',
            'Culture & Society',
            'Sports & Recreation',
            'Humor & Memes',
            'Psychology',
            'Music',
            'Food & Cooking',
        ];


        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        // Generate Sparks with random categories
        Spark::factory(50)->create();
    }
}
