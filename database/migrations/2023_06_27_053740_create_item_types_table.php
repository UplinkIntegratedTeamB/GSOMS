<?php

use App\Models\ItemType;
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
        Schema::create('item_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
            // $table->unsignedBigInteger('asset')->nullable();
            // $table->foreign('asset')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });

        $now = now();
        ItemType::insert([
            ['type' => 'Accountable Forms', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Advertisement', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Advertising Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Agricultural Supplies', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Animal/Zoological', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Auditing Services', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Automotive Supplies', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Building Maintenance', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Confidential Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Consultancy Services', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Drugs and Medicine Supplies', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Electricity Expenses', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Environment/Sanitary Services', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Food Suppplies', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Gasoline, Oil and Lubricant Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Infrastrature Assets', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Internet Expenses', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Invesment Property', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Janitorial Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Laboratory, Medical and Dental Supplies', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Legal Services', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Maintenance Services', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Military and Police Supplies', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Non-accountable Forms ', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Office Supplies ', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Expenses', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Forms, Plates, Permit and Sticker', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Maintenance and Operating Expenses', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Supplies and Material Expense', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Postage and Deliveries', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Printing and Publication Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Prizes', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Rent Expense', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Representation Expenses', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Representation Tokens', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Scholarship Services', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Security Services', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Subscription Services', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Telephone Expenses - Landline', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Telephone Expenses - Mobile', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Textbooks and Instructional Material Supplies', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Training Expenses', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Traveling Expenses - Local', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Traveling Expenses - Foreign', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Water Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_types');
    }
};
