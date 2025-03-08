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
        Schema::create('portfolio_operatings', function (Blueprint $table) {
            $table->id();
            $table->integer('personnel_id');
            $table->string('no');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('main_responsibilities')->nullable();
            $table->text('main_responsibility_result')->nullable();
            $table->text('main_responsibility_other')->nullable();
            $table->text('board_working_group_1')->nullable();
            $table->text('board_working_position_1')->nullable();
            $table->text('board_working_start_1')->nullable();
            $table->string('board_number_of_meeting_1')->nullable();
            $table->text('board_working_group_2')->nullable();
            $table->text('board_working_position_2')->nullable();
            $table->text('board_working_start_2')->nullable();
            $table->string('board_number_of_meeting_2')->nullable();
            $table->text('board_working_group_3')->nullable();
            $table->text('board_working_position_3')->nullable();
            $table->text('board_working_start_3')->nullable();
            $table->string('board_number_of_meeting_3')->nullable();
            $table->text('other_tasks_and_assignments')->nullable();
            $table->text('outstanding_achievements_and_awards')->nullable();
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
        Schema::dropIfExists('portfolio_operatings');
    }
};
