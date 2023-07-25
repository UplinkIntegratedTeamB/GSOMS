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
        Schema::create('request_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->foreignId('division_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('section_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('requested_by');
            $table->string('evaluated_by');
            $table->string('procurement_mode_id')->nullable();
            $table->string('pr_no')->nullable();
            $table->date('date1');
            $table->string('ppmp_no')->nullable();
            $table->string('purpose')->nullable();
            $table->string('region')->nullable();
            $table->string('sof')->nullable();
            $table->unsignedBigInteger('euo')->nullable();
            $table->foreign('euo')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('grand_total');
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_details');
    }
};
