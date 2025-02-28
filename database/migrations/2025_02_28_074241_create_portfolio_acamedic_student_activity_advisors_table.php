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
        Schema::create('portfolio_acamedic_student_activity_advisors', function (Blueprint $table) {
            $table->id();
            $table->integer('portfolio_academic_id');
            $table->text('subject');
            $table->text('description');
            $table->text('documents')->nullable();     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_acamedic_student_activity_advisors');
    }
};
