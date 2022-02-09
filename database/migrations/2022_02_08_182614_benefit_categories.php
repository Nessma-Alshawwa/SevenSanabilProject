<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BenefitCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit_categories', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->foreignId('benefit_request_id')->references('id')->on('benefit_requests');
            $table->foreignId('category_id')->references('id')->on('categories');
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
        Schema::drop('benefit_categories');
    }

}
