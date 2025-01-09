<?php

namespace Database\Factories;
use App\Models\Permissions;
use Illuminate\Database\Eloquent\Factories\Factory;
class PermissionsFactory extends Factory
{
    protected $model = Permissions::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'pages' => $this->faker->sentence
        ];
    }
}
