<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('description');
            $table->enum('indicator', ['Sales', 'Report']);
            $table->date('deadline');
            $table->date('actual_date');
            $table->integer('indicator_target');
            $table->integer('indicator_weight');
            $table->integer('indicator_late');
            $table->string('createdBy')->default('System');
            $table->timestamp('createdAt')->default(now());
            $table->string('updatedBy')->nullable(true)->default(null);
            $table->timestamp('updatedAt')->nullable(true)->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasklists');
    }
};
