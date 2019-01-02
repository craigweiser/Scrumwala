<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstimationToIssues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issues', function ($table) {
            $table->smallInteger('estimation')->nullable()->after('deadline')->unsigned;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issues', function ($table) {
            $table->dropColumn('estimation');
        });
    }
}
