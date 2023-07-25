<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bac_res', function (Blueprint $table) {
            $table->id();
            $table->string('c_number')->nullable();
            $table->string('res_title');
            $table->string('item_details');
            $table->date('meeting');
            $table->string('amount_in_words');
            $table->string('apprv_date');
            $table->foreignId('request_detail_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bac_res');
    }
};
