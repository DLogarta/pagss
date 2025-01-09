<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $databaseName = 'lar_pagss_analytics';
        DB::statement("CREATE DATABASE IF NOT EXISTS $databaseName");

        // Switch to the new database connection (optional)
        config(['database.connections.analytics.database' => $databaseName]);
        DB::purge('analytics');
        DB::reconnect('analytics');

        Schema::connection('analytics')->create('user_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('activity_type');
            $table->text('activity_details');
            $table->string('ip_address');
            $table->string('user_agent');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('lar_pagss_users.users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activity_logs');
    }
};
