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
        Schema::create('vehicle_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('engine_no');
            $table->string('chasis_no');
            $table->string('body_color');
            $table->string('new_donation');
            $table->string('make_type_body');
            $table->string('description');
            $table->string('amount');
            $table->string('weight');
            $table->date('lto_start');
            $table->date('lto_until');
            $table->date('gsis');
            $table->string('plate_no');
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
        Schema::dropIfExists('vehicle_registrations');
    }
};
