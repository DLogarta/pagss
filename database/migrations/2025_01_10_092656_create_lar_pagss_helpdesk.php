<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $connection = 'helpdesk';
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('id', 8)->primary();
            $table->string('name');
            $table->string('id_number');
            $table->string('phone', 11);
            $table->string('email');
            $table->string('location');
            $table->string('subject');
            $table->text('description');
            $table->enum('priority_level', ['Low', 'Medium', 'High', 'Critical'])->default('Low');
            $table->enum('status', ['Pending', 'Ongoing', 'Resolved', 'Fake', 'Archived'])->default('Pending');
            $table->json('attachments')->nullable();
            $table->integer('assigned_to')->nullable();
            $table->string('reason')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
