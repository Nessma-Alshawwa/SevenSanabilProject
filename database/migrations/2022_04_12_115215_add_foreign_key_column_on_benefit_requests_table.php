<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyColumnOnBenefitRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('benefit_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('donation_request_id')->nullable();
            $table->foreign('donation_request_id')->references('id')->on('donation_requests')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('benefit_requests', function (Blueprint $table) {
            $table->dropColumn('donation_request_id');
        });
    }
}
