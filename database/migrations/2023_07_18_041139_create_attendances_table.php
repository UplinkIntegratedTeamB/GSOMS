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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bidding_abstract_id')->constrained()->cascadeOnDelete();
            $table->string('bac_chairman');
            $table->string('bac_vc');
            $table->string('secretariat');
            $table->string('member_1');
            $table->string('member_2');
            $table->string('member_3');
            $table->string('member_4');
            $table->string('member_5');
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
        Schema::dropIfExists('attendances');
    }
};
