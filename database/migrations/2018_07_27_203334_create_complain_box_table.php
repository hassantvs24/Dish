<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainBoxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complain_box', function (Blueprint $table) {
            $table->increments('complainID');
            $table->integer('customerID')->unsigned()->index();
            $table->foreign('customerID')->references('customerID')->on('customer')->onDelete('cascade')->onUpdate('No Action');
            $table->string('descriptions');
            $table->string('status',15)->default('Incomplete');
            $table->string('sector', 20)->nullable()->default('Dish');
            $table->integer('userID')->nullable()->unsigned()->index();
            $table->foreign('userID')->references('id')->on('users')->onDelete('No Action')->onUpdate('No Action');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complain_box');
    }
}
