<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsersFactory extends Factory
{
    protected $model = Users::class;
    public function definition(): array
    {
        return [
            'id_number' => $this->faker->unique()->numerify('#############'), // Generate a random 11-digit ID number
            'name' => $this->faker->name, // Generate a random name
            'pfp' => $this->faker->imageUrl(400, 400, 'people'), // Generate a random image URL for the profile picture
            'position' => $this->faker->jobTitle, // Generate a random job title
            'email' => $this->faker->unique()->safeEmail, // Generate a unique email address
            'first_login' => $this->faker->boolean, // Generate a random boolean (true or false)
            'password' => bcrypt('password123'),
        ];
    }
}
