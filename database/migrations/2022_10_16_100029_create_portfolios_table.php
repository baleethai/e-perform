<?php

use App\Enums\ApproveStatus;
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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_id')->constrained();
            $table->string('code')->unique();
            $table->integer('no')->default(0);
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('started_at')->nullable();
            $table->date('ended_at')->nullable();
            $table->text('documents')->nullable();
            $table->integer('sort')->nullable();
            $table->text('remark')->nullable();
            $table->boolean('is_approve')->default(ApproveStatus::PENDING());
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
        Schema::dropIfExists('portfolios');
    }
};
