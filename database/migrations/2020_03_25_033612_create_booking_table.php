<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("customer_id")->nullable();;
            $table->unsignedBigInteger("car_id")->nullable();;
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('set null');
            $table->date("rent_start_date")->nullable();
            $table->date("rent_end_date")->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->boolean('ongoing')->default(1);
            $table->INTEGER("total");
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
        Schema::dropIfExists('bookings');
    }
}
