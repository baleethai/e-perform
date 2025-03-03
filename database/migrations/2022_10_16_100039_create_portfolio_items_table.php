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
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained();
            $table->foreignId('portfolio_type_id')->constrained();
            $table->string('code')->unique();
            $table->text('name');
            $table->text('result')->nullable();
            $table->text('remark')->nullable();
            $table->integer('sort')->nullable();
            $table->text('documents')->nullable();
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
        Schema::dropIfExists('portfolio_items');
    }
};
