<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartDateAndEndDateToCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->date('start_date');
            $table->date('end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
}
