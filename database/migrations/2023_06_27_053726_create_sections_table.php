<?php

use App\Models\Section;
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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('division_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        $now = now();
        Section::insert([
            ['name' => 'MNAO', 'division_id' => 16, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Child Protection Unit (CPU)', 'division_id' => 18, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PWD', 'division_id' => 18, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Senior Citizen', 'division_id' => 18, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
