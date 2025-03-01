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
        Schema::create('portfolio_acamedic_other_awards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_acamedic_id')->constrained();
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
        Schema::dropIfExists('portfolio_acamedic_other_awards');
    }
};
