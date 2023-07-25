<?php

use App\Models\ProcurementMode;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('procurement_modes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $now = now();
        ProcurementMode::insert([
            ['name' => 'Bidding', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Shopping', 'created_at' => $now, 'updated_at' => $now],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procurement_modes');
    }
};
