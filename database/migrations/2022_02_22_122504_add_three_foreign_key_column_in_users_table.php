<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThreeForeignKeyColumnInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_level_id')->nullable();
            $table->foreign('user_level_id')->references('id')->on('user_levels')->onDelete('set null');
            $table->unsignedBigInteger('committee_id')->nullable();
            $table->foreign('committee_id')->references('id')->on('committees')->onDelete('set null');
            $table->unsignedBigInteger('donor_id')->nullable();
            $table->foreign('donor_id')->references('id')->on('donors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_level_id');
            $table->dropColumn('committee_id');
            $table->dropColumn('donor_id');
        });
    }
}
