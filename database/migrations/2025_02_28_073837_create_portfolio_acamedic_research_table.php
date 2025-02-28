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
        Schema::create('portfolio_acamedic_research', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_academic_id')->constrained()->cascadeOnDelete();
            $table->string('subject');
            $table->string('time');
            $table->string('funding_source');
            $table->string('budget');
            $table->string('responsibility');
            $table->string('number_of_researchers');
            $table->string('research_achievements_and_progress');
            $table->text('documents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_acamedic_research');
    }
};
