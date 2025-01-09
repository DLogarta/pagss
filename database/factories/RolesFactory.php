<?php

namespace Database\Factories;

use App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolesFactory extends Factory
{
    protected $model = Roles::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, // A random word for the 'name' column
            'description' => $this->faker->paragraph, // A random paragraph for the 'description' column
            'color' => $this->faker->hexColor,
        ];
    }
}
