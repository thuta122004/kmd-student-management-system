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
        Schema::create('attendance_adjustment_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendance_ledger_id')->constrained()->cascadeOnDelete();
            $table->foreignId('adjusted_by')->constrained('teachers')->cascadeOnDelete();
            $table->enum('old_status', ['Present', 'Absent', 'Late', 'Excused']);
            $table->enum('new_status', ['Present', 'Absent', 'Late', 'Excused']);
            $table->text('justification');
            $table->timestamp('adjusted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_adjustment_logs');
    }
};
