<?php

use App\Models\ProjectProcurement;
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
        Schema::create('project_procurements', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('division_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('section_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        $now = now();
        ProjectProcurement::insert([
            ['code' => '2023-1011-001', 'department_id' => 1, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-002', 'department_id' => null, 'division_id' => 7, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-003', 'department_id' => null, 'division_id' => 14, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-004', 'department_id' => null, 'division_id' => 13, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-005', 'department_id' => null, 'division_id' => 12, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-006', 'department_id' => null, 'division_id' => 1, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-007', 'department_id' => null, 'division_id' => 4, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-008', 'department_id' => null, 'division_id' => 2, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-A01', 'department_id' => null, 'division_id' => 5, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-A02', 'department_id' => null, 'division_id' => 8, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-A03', 'department_id' => null, 'division_id' => null, 'section_id' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-A04', 'department_id' => null, 'division_id' => null, 'section_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1011-A05', 'department_id' => null, 'division_id' => null, 'section_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1015-001', 'department_id' => 2, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1016-001', 'department_id' => 20, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1021-001', 'department_id' => 16, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1031-001', 'department_id' => 3, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1041-001', 'department_id' => 15, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1061-001', 'department_id' => 12, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1071-001', 'department_id' => 9, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1081-001', 'department_id' => 4, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1091-001', 'department_id' => 19, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1101-001', 'department_id' => 7, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-1121-001', 'department_id' => 23, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-4411-001', 'department_id' => 13, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-4413-001', 'department_id' => 18, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-8711-001', 'department_id' => 5, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-8751-001', 'department_id' => 11, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-8811-001', 'department_id' => 14, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-8812-001', 'department_id' => 17, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['code' => '2023-9992-001', 'department_id' => 8, 'division_id' => null, 'section_id' => null, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_procurements');
    }
};
