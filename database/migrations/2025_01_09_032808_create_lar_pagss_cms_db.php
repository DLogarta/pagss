<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Create the database if it does not exist
        $databaseName = 'lar_pagss_cms';
        DB::statement("CREATE DATABASE IF NOT EXISTS $databaseName");

        // Switch to the new database connection (optional)
        config(['database.connections.cms.database' => $databaseName]);
        DB::purge('cms');
        DB::reconnect('cms');

        Schema::connection('cms')->create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image', 535);
            $table->timestamps();
        });

        Schema::connection('cms')->create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('image', 535);
            $table->string('name');
            $table->string('title');
            $table->string('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('cms')->dropIfExists('clients');
        Schema::connection('cms')->dropIfExists('organizations');
    }
};
