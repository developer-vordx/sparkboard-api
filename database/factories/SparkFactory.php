<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Spark;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Spark>
 */
class SparkFactory extends Factory
{
    private static $categoryIds;
    private static $userIds;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        if (!self::$categoryIds) {
            self::$categoryIds = Category::pluck('id')->toArray();
        }

        if (!self::$userIds) {
            self::$userIds = User::pluck('id')->toArray();
        }

        return [
            'title' => ucfirst(fake()->sentence(3)),
            'description' => fake()->paragraph(),
            'category_id' => fake()->randomElement(self::$categoryIds),
            'user_id' => fake()->randomElement(self::$userIds),
            'visibility' => fake()->randomElement(['public', 'anonymous']),
        ];
    }
}
