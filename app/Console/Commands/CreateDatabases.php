<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabases extends Command
{
    protected $signature = 'db:create-db';

    protected $description = 'Create multiple predefined databases';

    public function handle(): void
    {
        $databases = [
            'lar_pagss',
            'lar_pagss_users',
            'lar_pagss_cms',
            'lar_pagss_analytics',
        ];

        foreach ($databases as $dbName) {
            try {
                DB::connection('mysql')->statement("CREATE DATABASE IF NOT EXISTS `$dbName`");
                $this->info("Database '$dbName' created successfully!");
            } catch (\Exception $e) {
                $this->error("Error creating database '$dbName': " . $e->getMessage());
            }
        }
    }
}
