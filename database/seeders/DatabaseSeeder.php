<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\RolePermissions;
use App\Models\Roles;
use App\Models\UserRoles;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Permissions::factory()->create([
            'name' => 'All Permission',
            'description' => 'Allow all access',
            'pages' => json_encode(["user-management", "role-management", "permission-management", "user-activity-reports", "c-about-us", "c-people", "c-clients"]),
        ]);

        Roles::factory()->create([
            'name' => 'Developer',
            'description' => 'Developer Mode',
            'color' => 'warning',
        ]);

        Users::factory()->create([
            'id_number' => 'A10272',
            'name' => 'Daniel Logarta',
            'position' => 'IT Assistant/Developer',
            'email' => 'danielogarta09@gmail.com',
            'password' => bcrypt('danielogarta09'),
        ]);

        RolePermissions::factory()->create([
            'role_id' => 1,
            'permission_id' => 1,
        ]);

        UserRoles::factory()->create([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
