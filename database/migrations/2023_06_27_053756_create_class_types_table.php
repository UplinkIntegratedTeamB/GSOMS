<?php

use App\Models\ClassType;
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
        Schema::create('class_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $now = now();
        ClassType::insert([
            ['name' => 'Wholesaler', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Retailer', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Services', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Importer', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Wholesaler/Retailer', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Catering Services', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pest Control Services', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Retailer/Services', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Local Government Services', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_types');
    }
};
