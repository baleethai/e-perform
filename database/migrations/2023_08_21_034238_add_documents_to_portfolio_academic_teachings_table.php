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
        Schema::table('portfolio_academic_teachings', function (Blueprint $table) {
            $table->text('documents')->nullable()->after('thesis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolio_academic_teachings', function (Blueprint $table) {
            $table->dropColumn('documents');
        });
    }
};
