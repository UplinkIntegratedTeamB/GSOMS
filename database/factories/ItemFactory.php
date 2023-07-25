<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\ItemType;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->value('id'),
            'description' => fake()->text(10),
            'item_type_id' => ItemType::inRandomOrder()->value('id'),
            'unit_id' => Unit::inRandomOrder()->value('id'),
            'unit_price' => fake()->numerify('###'),
            'quantity' => fake()->numerify('###'),
        ];
    }
}
