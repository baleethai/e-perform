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
        Schema::create('portfolio_academic_teachings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_academic_id')->constrained()->cascadeOnDelete();
            $table->string('subject')->nullable();
            $table->string('level')->nullable();
            $table->string('number_of_credits')->nullable();
            $table->string('number_of_students')->nullable();
            $table->string('describe')->nullable();
            $table->string('operating')->nullable();
            $table->string('thesis')->nullable();
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
        Schema::dropIfExists('portfolio_academic_teachings');
    }
};
