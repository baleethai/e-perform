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
        Schema::create('portfolio_acamedic_teachings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_acamedic_id')->constrained();
            $table->string('subject')->nullable();
            $table->string('level')->nullable();
            $table->string('number_of_credits')->nullable();
            $table->string('number_of_students')->nullable();
            $table->string('describe')->nullable();
            $table->string('operating')->nullable();
            $table->string('thesis')->nullable();
            $table->text('documents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_acamedic_teachings');
    }
};
