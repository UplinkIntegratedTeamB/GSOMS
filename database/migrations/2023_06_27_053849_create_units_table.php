<?php

use App\Models\Unit;
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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_code');
            $table->string('description');
            $table->timestamps();
        });

        Unit::insert([
            ['unit_code' => '055', 'description' => 'AMP'],
            ['unit_code' => '069', 'description' => 'BAG/S'],
            ['unit_code' => '106', 'description' => 'BAR/S'],
            ['unit_code' => '108', 'description' => 'BASTA'],
            ['unit_code' => '068', 'description' => 'BDFT'],
            ['unit_code' => '098', 'description' => 'BKLT'],
            ['unit_code' => '062', 'description' => 'BOOK'],
            ['unit_code' => '024', 'description' => 'BOX/ES'],
            ['unit_code' => '025', 'description' => 'BLT/S'],
            ['unit_code' => '064', 'description' => 'BUNDLE/S'],
            ['unit_code' => '090', 'description' => 'CAL'],
            ['unit_code' => '047', 'description' => 'CAN/S'],
            ['unit_code' => '054', 'description' => 'CART'],
            ['unit_code' => '110', 'description' => 'CASE'],
            ['unit_code' => '114', 'description' => 'Cavan'],
            ['unit_code' => '097', 'description' => 'CONT'],
            ['unit_code' => '084', 'description' => 'COPIES'],
            ['unit_code' => '053', 'description' => 'C.U.M'],
            ['unit_code' => '026', 'description' => 'CUBIC/S'],
            ['unit_code' => '099', 'description' => 'CUP/S'],
            ['unit_code' => '071', 'description' => 'D/T'],
            ['unit_code' => '103', 'description' => 'day'],
            ['unit_code' => '104', 'description' => 'day/s'],
            ['unit_code' => '081', 'description' => 'DOZEN'],
            ['unit_code' => '094', 'description' => 'DRUM/S'],
            ['unit_code' => '070', 'description' => 'ELF'],
            ['unit_code' => '027', 'description' => 'FEET/S'],
            ['unit_code' => '050', 'description' => 'PACK/S'],
            ['unit_code' => '039', 'description' => 'PC/S'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
