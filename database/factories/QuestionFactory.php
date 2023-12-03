<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "title" => fake()->sentence(rand(3,5)),
            "body" => fake()->paragraph(rand(5,8),true),
            "views" => rand(0,10),
            "answers" => rand(0,10),
            "votes" => rand(-10,10),
            "user_id" => rand(1,5)
        ];
    }
}
