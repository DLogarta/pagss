<?php

namespace Database\Factories;

use App\Models\Roles;
use App\Models\UserRoles;
use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserRolesFactory extends Factory
{
    protected $model = UserRoles::class;
    public function definition(): array
    {
        return [
            'user_id' => Users::all()->random()->id, // Get a random role ID from all roles
            'role_id' => Roles::all()->random()->id,
        ];
    }
}
