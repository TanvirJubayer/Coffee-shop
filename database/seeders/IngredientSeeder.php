<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            ['name' => 'Coffee Beans', 'slug' => 'coffee-beans', 'unit' => 'kg', 'quantity' => 50, 'alert_threshold' => 10],
            ['name' => 'Milk', 'slug' => 'milk', 'unit' => 'liter', 'quantity' => 100, 'alert_threshold' => 20],
            ['name' => 'Sugar', 'slug' => 'sugar', 'unit' => 'kg', 'quantity' => 50, 'alert_threshold' => 5],
            ['name' => 'Syrup', 'slug' => 'syrup', 'unit' => 'bottle', 'quantity' => 20, 'alert_threshold' => 3],
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}
