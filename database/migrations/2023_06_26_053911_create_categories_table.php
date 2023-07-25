<?php

use App\Models\Category;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $now = now();
        Category::insert([
            ['name' => 'Consumables', 'created_at' => $now, 'updated_at' => $now  ],
            ['name' => 'Fixed Asset', 'created_at' => $now, 'updated_at' => $now  ],
            ['name' => 'Semi-Expendables', 'created_at' => $now, 'updated_at' => $now  ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
