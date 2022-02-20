<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuantitiesSpentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantities_spent', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donation_request_id')->references('id')->on('donation_requests');
            $table->foreignId('benefit_request_id')->references('id')->on('benefit_requests');
            $table->integer('amount_spent');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantities_spent');
    }
}
