<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text($maxNbChars = 50),
            'content' => $this->faker->paragraph(),
            'is_featured' =>$this->faker->boolean(),
            'status' => $this->faker->randomElement(['Pending' ,'Wait', 'Active']),
        ];
    }
}
