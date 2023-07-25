<?php

use App\Models\Department;
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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department_code')->nullable();
            $table->string('name');
            $table->foreignId('expense_type_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
        $now = now();
        Department::insert([
            ['department_code' => null, 'name' => "Mayor's Office", 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'BPLO', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'HRMO', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Office of the Internal Control', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Office of the Municipal Accountant', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Mun. Agriculture', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Assessors Office', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Local School Board', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Mun. Budget Office', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'LCR', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Office of the Municipal Engineer', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'GSO', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Office of the Municipal Health', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Market Office', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'MPDC', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Sang. Bayan', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Mun. Slaughterhouse', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Office of the Municipal Social Welfare and Development', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Mun. Treasury Office', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Vice Mayor', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'PNP', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'PIO', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => null, 'name' => 'Office of the Municipal Civil Registrar', 'expense_type_id' => null, 'created_at' => $now, 'updated_at' => $now],
            // ['department_code' => '', 'name' => 'MDRRMO', 'expense_type_id' => '', 'created_at' => $now, 'updated_at' => $now],
            ['department_code' => '1011-100', 'name' => "Mayor's Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-200', 'name' => "Mayor's Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-300', 'name' => "Mayor's Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-A01-100', 'name' => "Gender and Development - MOOE" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-A01-200', 'name' => "Gender and Development - CO" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code'=> '1011-A02-100', 'name' => "MDRRM Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-A02-200', 'name' => "MDRRM Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-A02-300', 'name' => "MDRRM Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-A03-100', 'name' => "Senior Citizens Affair's - MOOE" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-A03-300', 'name' => "Senior Citizens Affair's - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-A04-100', 'name' => "PWD Office - MOOE" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-A04-200', 'name' => "PWD Office - CO" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-A05-100', 'name' => "Child Protection Program - MOOE" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-A05-300', 'name' => "Child Protection Program - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-ICT-100', 'name' => "Municipal Information & Commo Tech - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-ICT-200', 'name' => "Municipal Information & Commo Tech - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-ICT-300', 'name' => "Municipal Information & Commo Tech - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-LYDO-100', 'name' => "Local Youth Development Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-LYDO-200', 'name' => "Local Youth Development Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-Pao-200', 'name' => "Peace & Order and Anti Drugs - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-Pao-300', 'name' => "Peace & Order and Anti Drugs - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-Pov-100', 'name' => "Poverty Reduction & Enterprises Dev - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1011-Pov-200', 'name' => "Poverty Reduction & Enterprises Dev - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1015-100', 'name' => "Bus. Permit & Licensing - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1015-200', 'name' => "Bus. Permit & Licensing - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1015-300', 'name' => "Bus. Permit & Licensing - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1016-100', 'name' => "Vice Mayor's Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1016-200', 'name' => "Vice Mayor's Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1016-300', 'name' => "Vice Mayor's Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1021-100', 'name' => "Sangguniang Bayan Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1021-200', 'name' => "Sangguniang Bayan Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1021-300', 'name' => "Sangguniang Bayan Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1032-100', 'name' => "Human Resource Mgmt Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1032-200', 'name' => "Human Resource Mgmt Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1032-300', 'name' => "Human Resource Mgmt Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1041-100', 'name' => "Municipal Planning and Development Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1041-200', 'name' => "Municipal Planning and Development Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1041-300', 'name' => "Municipal Planning and Development Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1041-UDH-100', 'name' => "Municipal Urban Development & Housing Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1041-UDH-200', 'name' => "Municipal Urban Development & Housing Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1041-UDH-300', 'name' => "Municipal Urban Development & Housing Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1051-100', 'name' => "Local Civil Registry - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1051-200', 'name' => "Local Civil Registry - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1051-300', 'name' => "Local Civil Registry - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1061-100', 'name' => "Municipal General Services Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1061-200', 'name' => "Municipal General Services Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1061-300', 'name' => "Municipal General Services Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1061-ENR-100', 'name' => "Municipal Environment & Natural Resources Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1061-ENR-200', 'name' => "Municipal Environment & Natural Resources Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1061-ENR-300', 'name' => "Municipal Environment & Natural Resources Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1071-100', 'name' => "Municipal Budget Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1071-200', 'name' => "Municipal Budget Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1071-300', 'name' => "Municipal Budget Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1081-100', 'name' => "Municipal Accounting Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1081-200', 'name' => "Municipal Accounting Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1081-300', 'name' => "Municipal Accounting Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1091-100', 'name' => "Municipal Treasury Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1091-200', 'name' => "Municipal Treasury Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1091-300', 'name' => "Municipal Treasury Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1101-100', 'name' => "Municipal Assessor's Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1101-200', 'name' => "Municipal Assessor's Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1101-300', 'name' => "Municipal Assessor's Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1121-100', 'name' => "Public Info & Community Affairs Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1121-200', 'name' => "Public Info & Community Affairs Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1121-300', 'name' => "Public Info & Community Affairs Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1919-200', 'name' => "20% Development Fund - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '1919-300', 'name' => "20% Development Fund - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '4411-100', 'name' => "Municipal Health Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '4411-200', 'name' => "Municipal Health Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '4411-300', 'name' => "Municipal Health Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '4413-100', 'name' => "Municipal social Welfare & Development - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '4413-200', 'name' => "Municipal social Welfare & Development - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '4413-300', 'name' => "Municipal social Welfare & Development - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8711-100', 'name' => "Municipal Agriculture Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8711-200', 'name' => "Municipal Agriculture Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8711-300', 'name' => "Municipal Agriculture Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8751-100', 'name' => "Municipal Engineering Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8751-200', 'name' => "Municipal Engineering Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8751-300', 'name' => "Municipal Engineering Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8811-100', 'name' => "Market Administration Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8811-200', 'name' => "Market Administration Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8811-300', 'name' => "Market Administration Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8812-100', 'name' => "Slaughterhouse Operation - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8812-200', 'name' => "Slaughterhouse Operation - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8812-300', 'name' => "Slaughterhouse Operation - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8841-100', 'name' => "Public Cemetery Operation - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8841-200', 'name' => "Public Cemetery Operation - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '8841-300', 'name' => "Public Cemetery Operation - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '9991-200', 'name' => "Disaster Risk Reduction Management Fund - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '9991-300', 'name' => "Disaster Risk Reduction Management Fund - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '9992-100', 'name' => "Non-Office - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => '9992-200', 'name' => "Non-Office - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'C1011-300', 'name' => "Continuing Approp Mayor's Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'C1011-A01-300', 'name' => "Continuing Approp GAD - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'C1011-A05-300', 'name' => "Continuing Child Protection Program- CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'C1011-PaO-300', 'name' => "Continuing Approp Peace & Order and Anti Drugs - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'C1016-300', 'name' => "Continuing Approp Vice-Mayor's Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'C1021-300', 'name' => "Continuing Approp Sangguniang Bayan - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'C1919-200', 'name' => "Continuing Approp 20% Dev Fund - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'C1919-300', 'name' => "Continuing Approp 20% Dev Fund - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'C8711-300', 'name' => "Continuing Approp Agriculture Office - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'C8812-300', 'name' => "Continuing Approp Slaughterhouse Operation - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'C9991-300', 'name' => "Continuing Approp DRRM Fund - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'S1011-100', 'name' => "Surplus General Fund - PS" , 'expense_type_id' => 1, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'S1011-200', 'name' => "Surplus General Fund - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'S1011-300', 'name' => "Surplus General Fund - CO" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'S1919-200', 'name' => "Surplus 20% Dev Fund - MOOE" , 'expense_type_id' => 2, 'created_at' => $now, 'updated_at' => $now ],
            ['department_code' => 'S1919-300', 'name' => "Surplus 20% Dev Fund - Co" , 'expense_type_id' => 3, 'created_at' => $now, 'updated_at' => $now ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
