<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_awards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_id')->constrained();
            $table->string('name');
            $table->text('year')->nullable();
            $table->string('description')->nullable();
            $table->text('documents')->nullable();
            $table->integer('sort')->nullable();
            $table->boolean('is_visible')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel_awards');
    }
};
