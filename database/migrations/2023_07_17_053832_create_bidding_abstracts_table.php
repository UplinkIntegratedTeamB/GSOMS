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
        Schema::create('bidding_abstracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('winner')->nullable();
            $table->foreign('winner')->references('id')->on('suppliers')->cascadeOnDelete();
            $table->string('winner_total')->nullable();
            $table->string('purpose');
            $table->string('cash_bond');
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
        Schema::dropIfExists('bidding_abstracts');
    }
};
