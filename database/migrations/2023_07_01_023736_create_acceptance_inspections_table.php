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
        Schema::create('acceptance_inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_detail_id')->constrained()->cascadeOnDelete();
            $table->string('c_number')->nullable();
            $table->string('obr_no');
            $table->string('invoice_no');
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
        Schema::dropIfExists('acceptance_inspections');
    }
};
