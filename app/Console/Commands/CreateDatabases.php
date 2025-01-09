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
            env('DB_DATABASE'),
            env('CMS_DB_DATABASE'),
            env('USER_ADMIN_DB_DATABASE'),
            env('ANALYTICS_DB_DATABASE'),
        ];

        foreach ($databases as $database) {
            if (!$database) {
                $this->error('Database name is not set in .env');
                continue;
            }

            try {
                DB::statement("CREATE DATABASE IF NOT EXISTS `$database`");
                $this->info("Database '$database' created successfully!");
            } catch (\Exception $e) {
                $this->error("Error creating database '$database': " . $e->getMessage());
            }
        }
    }
}
