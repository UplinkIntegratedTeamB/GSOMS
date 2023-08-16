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
        Schema::create('trip_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            $table->foreignId('division_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_registration_id')->constrained()->cascadeOnDelete();
            $table->foreignId('supplier_id')->constrained()->cascadeOnDelete();
            $table->string('driver');
            $table->string('passenger');
            $table->foreignId('month_id')->constrained()->cascadeOnDelete();
            $table->integer('gas_type');
            $table->string('place_to_visit');
            $table->string('purpose');
            $table->float('amount');
            $table->float('oil_issued');
            $table->date('date');
            $table->string('start_time');
            $table->string('end_time');

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
        Schema::dropIfExists('trip_tickets');
    }
};
