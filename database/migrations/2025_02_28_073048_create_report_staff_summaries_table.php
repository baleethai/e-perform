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
        Schema::create('report_staff_summaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('education')->default(0);
            $table->integer('work')->default(0);
            $table->integer('teaching')->default(0);
            $table->integer('academic_service')->default(0);
            $table->integer('academic_work')->default(0);
            $table->integer('award')->default(0);
            $table->integer('research')->default(0);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_staff_summaries');
    }
};
