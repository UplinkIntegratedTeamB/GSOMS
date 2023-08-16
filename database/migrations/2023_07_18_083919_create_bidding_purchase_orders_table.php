<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidding_purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('request_detail_id');
            $table->string('po_no')->nullable();
            $table->string('payment_term');
            // $table->string('confirm_date');
            // $table->string('delivery_date');
            // $table->string('no_of_days');
            // $table->string('delivery_term');
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
        Schema::dropIfExists('bidding_purchase_orders');
    }
};
