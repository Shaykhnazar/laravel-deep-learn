<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => ucfirst($this->faker->words(4, true)),
            'body' => ucfirst($this->faker->sentences(4, true)),
            'created_at' => $this->faker->dateTimeBetween('-30 days'),
        ];
    }
}