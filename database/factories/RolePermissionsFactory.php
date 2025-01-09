<?php

namespace Database\Factories;

use App\Models\Permissions;
use App\Models\RolePermissions;
use App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolePermissionsFactory extends Factory
{
    protected $model = RolePermissions::class;
    public function definition(): array
    {
        return [
            'role_id' => Roles::all()->random()->id, // Get a random role ID from all roles
            'permission_id' => Permissions::all()->random()->id,
        ];
    }
}
