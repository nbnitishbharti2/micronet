<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettleTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settle_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('partner_id')->unsigned(); 
            $table->float('total_unsettled_amount');  
            $table->float('total_unsettled_amount_to_partner');
            $table->float('total_unsettled_amount_to_admin')->nullable();
            $table->float('total_commission');
            $table->enum('settle_status', ['0', '1'])->default('0');
            $table->enum('payment_flow_type', ['Cr', 'Dr']);
            $table->float('payment_flow');
            $table->timestamps();
        });

        Schema::table('settle_transactions', function($table){
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
        Schema::dropIfExists('settle_transactions');
    }
}
