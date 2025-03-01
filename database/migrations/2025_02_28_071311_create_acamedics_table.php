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
        Schema::create('acamedics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('acamedic_type_id')->constrained();
            $table->text('cover')->nullable();
            $table->text('name');
            $table->string('description')->nullable();
            $table->text('documents')->nullable();
            $table->string('author')->nullable();
            $table->integer('sort')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acamedics');
    }
};
