<?php

use App\Models\ExpenseType;
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
        Schema::create('expense_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $now = now();
        ExpenseType::insert([
            ['name' => 'Personal Services', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'M.O.O.E', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Capital Outlay', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Financial Expense', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Non-Office Expense', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('expense_type');
    }
};
