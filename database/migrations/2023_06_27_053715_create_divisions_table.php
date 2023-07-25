<?php

use App\Models\Division;
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
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        $now = now();
        Division::insert([
            ['name' => 'BFP', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'COA', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'COMELEC', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'DILG', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'GAD', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'HRMO', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'LYDO', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'MDRRMO', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'MTC', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'NUTRITION', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PIO', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PNP', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'POVERTY REDUCTION AND ENTERPRISE DEVELOPMENT OFFICE', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'SCTMO', 'department_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'ALS', 'department_id' => 8, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'MHO', 'department_id' => 13, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'NUTRITION', 'department_id' => 13, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'MSWDO', 'department_id' => 18, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisions');
    }
};
