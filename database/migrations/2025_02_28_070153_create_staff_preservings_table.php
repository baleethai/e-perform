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
        Schema::create('staff_preservings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained();
            $table->text('name');
            $table->string('description')->nullable();
            $table->string('documents')->nullable();
            $table->integer('sort')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_preservings');
    }
};
