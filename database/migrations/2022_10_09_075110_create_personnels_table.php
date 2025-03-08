<?php

use App\Enums\VisibleStatus;
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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prefix_id')->constrained();
            $table->foreignId('position_id')->constrained();
            $table->foreignId('user_id')->nullable();
            $table->string('code')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('full_name')->virtualAs('concat(first_name, \' \', last_name)');
            $table->string('id_card')->nullable();
            $table->date('birthdate')->nullable();
            $table->date('work_start_date');
            $table->text('bio')->nullable();
            $table->text('remark')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('password');
            $table->string('work_status')->default(\App\Enums\WorkStatus::PERFORMWORK);
            $table->integer('sort')->default(0);
            $table->boolean('is_visible')->default(VisibleStatus::IS_VISIBLE);
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
        Schema::dropIfExists('personnels');
    }
};
