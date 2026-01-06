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
        Schema::create('academic_cycles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->enum('exam_cycle', ['Autumn', 'Winter', 'Spring', 'Summer']);
            $table->string('academic_year', 20);
            $table->date('cycle_start');
            $table->date('cycle_end');
            $table->enum('cycle_status', ['planned', 'running', 'closed'])->default('planned');
            $table->boolean('is_locked')->default(false);
            $table->timestamps();

            $table->unique(['program_id', 'exam_cycle', 'academic_year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_cycles');
    }
};
