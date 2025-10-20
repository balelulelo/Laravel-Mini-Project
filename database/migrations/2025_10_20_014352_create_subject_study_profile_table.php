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
        Schema::create('subject_study_profile', function (Blueprint $table) {
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->foreignId('study_profile_id')->constrained()->onDelete('cascade');
            $table->primary(['subject_id', 'study_profile_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_study_profile');
    }
};
