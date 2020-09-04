<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
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
            $table->bigInteger('user_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('zip','6');
            $table->text('address');
            $table->string('mobile','100'); 
            $table->bigInteger('service_id')->unsigned(); 
            $table->bigInteger('service_plan_id')->unsigned(); 
            $table->bigInteger('type_id')->unsigned();
            $table->integer('category_id')->unsigned();  
            $table->bigInteger('sub_category_id')->unsigned(); 
            $table->bigInteger('price_by_city_id')->unsigned();
            $table->decimal('amount', 10,2);  
            $table->enum('payment_status', ['Pending', 'Completed']);
            $table->enum('payment_mode', ['Cash', 'Online']);
            $table->enum('payment_2', ['Admin', 'Partner']);
            $table->enum('status', ['New Booking', 'Partner Assigned', 'Completed']);
            $table->timestamp('booking_date')->default('current');
            $table->date('confirmation_date');
            $table->date('service_date');
            $table->date('payment_date');
            $table->bigInteger('partner_id')->unsigned();           
            $table->timestamps();
        });

        Schema::table('bookings', function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('service_plan_id')->references('id')->on('service_plans')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('price_by_city_id')->references('id')->on('price_by_cities')->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('users')->onDelete('cascade');
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
