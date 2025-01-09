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
        $databaseName = 'lar_pagss_usres';
        DB::statement("CREATE DATABASE IF NOT EXISTS $databaseName");

        // Switch to the new database connection (optional)
        config(['database.connections.user_admin.database' => $databaseName]);
        DB::purge('user_admin');
        DB::reconnect('user_admin');

        Schema::connection('user_admin')->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('id_number')->unique();
            $table->string('name');
            $table->string('pfp')->default('pagss_default_user.jpg');
            $table->string('position');
            $table->string('email')->unique();
            $table->boolean('first_login')->default(true);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::connection('user_admin')->create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('color');
            $table->timestamps();
        });

        Schema::connection('user_admin')->create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('pages', 535);
            $table->timestamps();
        });

        Schema::connection('user_admin')->create('role_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');
            $table->timestamps();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');
        });

        Schema::connection('user_admin')->create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::connection('user_admin')->dropIfExists('users');
        Schema::connection('user_admin')->dropIfExists('roles');
        Schema::connection('user_admin')->dropIfExists('permissions');
        Schema::connection('user_admin')->dropIfExists('role_permissions');
        Schema::connection('user_admin')->dropIfExists('user_roles');
    }
};
