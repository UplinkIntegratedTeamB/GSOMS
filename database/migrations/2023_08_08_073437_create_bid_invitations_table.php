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
        Schema::create('bid_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_detail_id')->constrained()->cascadeOnDelete();
            $table->string('good')->nullable();
            $table->string('issuance_of_bid');
            $table->string('start');
            $table->string('until');
            $table->string('opening_of_bids');
            $table->string('bid_evaluation');
            $table->string('post_qualification');
            $table->string('notice_of_award');
            $table->string('day');
            $table->string('pre_procurement')->nullable();
            $table->string('pre_bid')->nullable();
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
        Schema::dropIfExists('bid_invitations');
    }
};
