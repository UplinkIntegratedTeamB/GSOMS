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
            ['type' => 'Agricultural Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Animal/Zoological', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Auditing Services', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Automotive Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Building Maintenance', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Confidential Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Consultancy Services', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Drugs and Medicine Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Electricity Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Environment/Sanitary Services', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Food Suppplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Gasoline, Oil and Lubricant Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Infrastrature Assets', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Internet Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Invesment Property', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Janitorial Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Laboratory, Medical and Dental Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Legal Services', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Maintenance Services', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Military and Police Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Non-accountable Forms ', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Office Supplies ', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Forms, Plates, Permit and Sticker', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Maintenance and Operating Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Supplies and Material Expense', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Postage and Deliveries', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Printing and Publication Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Prizes', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Rent Expense', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Representation Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Representation Tokens', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Scholarship Services', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Security Services', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Subscription Services', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Telephone Expenses - Landline', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Telephone Expenses - Mobile', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Textbooks and Instructional Material Supplies', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Training Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Traveling Expenses - Local', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Traveling Expenses - Foreign', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Water Expenses', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Agricultural and Forestry Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Books', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Building and Other Structure', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Communication Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Communication Software', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Construction and Heavy Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Disaster Response and Rescue Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Furnitures and Fixtures', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Hostpital and Health Centers', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Hospital Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Information and Communication Technology Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Land Improvements', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Library / Books', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Machinery', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Medical, Dental and Laboratory Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Military and Police Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Motor Vehicles', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Office Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Machineries and Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Property Plant Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Supplies Expense', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Other Tranportation Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repair and Maintenance - Infrastructure Project', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Agricultural, Fishery and Forestry Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Aircrafts. Aurcraft Ground Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Airport Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Artesian Wells, Reservoirs, Pumping Stations and Conduits', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Communication Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Construction and Heavy Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Electrification, Power and Energy Structures', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Firefighting Equipment and Accessories', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Flood Controls', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Furnitures and Fixtures', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Hospital Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Hospital and Health Centers', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Irrigations, Canals and Laterals ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - IT Equipment and Software ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Land Improvements ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Lease Hold Improvements, Buildings ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Lease Hold Improvements, Land ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Machineries ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Markets and Slaugterhouses ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Medical, Dental and Laboratory ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Military and Police Equipment ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Motor Vehicles ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Office Buildings ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Office Equipment ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Other Leasedhold Improvements ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Other Machineries and Equipment ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Other Property, Plant and Equipment ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Other Public Infrastructures ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Other Structures ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Other Transportation Equipment ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Parks, Plazas and Monument ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Ports, Lighthouses and Harbors ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Railways ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Reforestation-Marshland / Swampland ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Reforestation-Upland ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Road, Highways and Bridges ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Runaways / Taxiways ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - School Buildings ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Sports Equipment ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Technical and Scientific Equipment ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Trains ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Watercrafts ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Repart and Maintenance - Waterways, Aqueducts, Seawalls, River Walls and Others ', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Sports Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Technical and Scientific Equipment', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['type' => 'Watercrafts', 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now],
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
