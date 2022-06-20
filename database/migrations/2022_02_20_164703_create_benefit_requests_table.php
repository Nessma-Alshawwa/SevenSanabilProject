<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status');
            $table->text('description');
            $table->integer('required_quantity');
            $table->integer('remaining_quantity');
            $table->integer('amount_spent');
            $table->foreignId('beneficiary_id')->references('id')->on('beneficiaries');
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
        Schema::dropIfExists('benefit_requests');

    }
}
