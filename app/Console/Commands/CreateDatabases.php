<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabases extends Command
{
    protected $signature = 'db:create-multiple';

    protected $description = 'Create multiple databases based on the configuration';

    public function handle(): void
    {
        $databases = [
            'lar_pagss',
            'lar_pagss_users',
            'lar_pagss_cms',
            'lar_pagss_analytics',
        ];

        foreach ($databases as $database) {
//            if (!$database) {
//                $this->error('Database name is not set in .env');
//                continue;
//            }

            try {
                DB::statement("CREATE DATABASE IF NOT EXISTS `$database`");
                $this->info("Database '$database' created successfully!");
            } catch (\Exception $e) {
                $this->error("Error creating database '$database': " . $e->getMessage());
            }
        }
    }
}
