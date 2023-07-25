<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Supplier;
use App\Models\ClassType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $highestId = Supplier::max('id');
        $nextId = $highestId + 1;

        $currentDate = Carbon::now();
        $expirationDate = $currentDate->addYear();

        return [
            'name' => fake()->name(),
            'control_no' => date('Y') . $nextId,
            'org_type' => fake()->sentence(),
            'expiration_date' => $expirationDate,
            'class_type_id' => ClassType::inRandomOrder()->value('id'),
            'address' => fake()->sentence(),
            'doc_submitted' => fake()->sentence(),
            'other_info' => fake()->sentence()
        ];
    }
}
