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
        Schema::create('portfolio_acamedic_student_advisors', function (Blueprint $table) {
            $table->id();
            $table->integer('portfolio_acamedic_id');
            $table->text('subject')->nullable();
            $table->string('undergraduate')->nullable();
            $table->string('graduate_level')->nullable();
            $table->text('documents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_acamedic_student_advisors');
    }
};
