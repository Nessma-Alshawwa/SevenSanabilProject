<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThreeForeignKeyColumnInRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->foreignId('user_level_id')->references('id')->on('user_levels');
            $table->foreignId('committee_id')->references('id')->on('committees')->nullable();
            $table->foreignId('donor_id')->references('id')->on('donors')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('user_level_id');
            $table->dropColumn('committee_id');
            $table->dropColumn('donor_id');
        });
    }
}
