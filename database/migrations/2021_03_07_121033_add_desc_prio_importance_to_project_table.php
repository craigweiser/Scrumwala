<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescPrioImportanceToProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('description', 255)->nullable();
            $table->integer('priority_order')->unsigned()->nullable()->unique()->default(null);
            $table->integer('importance')->unsigned()->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('priority_order');
            $table->dropColumn('importance');
        });
    }
}
