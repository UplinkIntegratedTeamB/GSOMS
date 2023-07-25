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
        Schema::create('bidding_resolutions', function (Blueprint $table) {
            $table->id();
            $table->string('c_number')->nullable();
            $table->string('amount_in_word');
            $table->string('start');
            $table->string('apprv_date');
            $table->string('date_time');
            $table->string('until');
            $table->foreignId('request_detail_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('bidding_resolutions');
    }
};
