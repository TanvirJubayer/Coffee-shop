<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CoffeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Hot Coffee
        $hotCoffee = Category::firstOrCreate(
            ['slug' => 'hot-coffee'],
            ['name' => 'Hot Coffee', 'image' => 'hot-coffee.png']
        );

        Product::firstOrCreate(['slug' => 'espresso'], [
            'category_id' => $hotCoffee->id,
            'name' => 'Espresso',
            'price' => 3.00,
            'cost' => 0.50,
            'image' => 'espresso.png',
            'description' => 'Strong and bold concentrated coffee.'
        ]);

        Product::firstOrCreate(['slug' => 'cappuccino'], [
            'category_id' => $hotCoffee->id,
            'name' => 'Cappuccino',
            'price' => 4.50,
            'cost' => 1.20,
            'image' => 'cappuccino.png',
            'description' => 'Espresso with steamed milk and foam.'
        ]);

         Product::firstOrCreate(['slug' => 'latte'], [
            'category_id' => $hotCoffee->id,
            'name' => 'Latte',
            'price' => 4.50,
            'cost' => 1.20,
            'image' => 'latte.png',
            'description' => 'Espresso with steamed milk.'
        ]);


        // 2. Cold Coffee
        $coldCoffee = Category::firstOrCreate(
            ['slug' => 'cold-coffee'],
            ['name' => 'Cold Coffee', 'image' => 'cold-coffee.png']
        );

        Product::firstOrCreate(['slug' => 'iced-americano'], [
            'category_id' => $coldCoffee->id,
            'name' => 'Iced Americano',
            'price' => 3.50,
            'cost' => 0.60,
            'image' => 'iced-americano.png',
            'description' => 'Espresso poured over ice and water.'
        ]);
        
        Product::firstOrCreate(['slug' => 'cold-brew'], [
            'category_id' => $coldCoffee->id,
            'name' => 'Cold Brew',
            'price' => 5.00,
            'cost' => 1.50,
            'image' => 'cold-brew.png',
            'description' => 'Slow-steeped cold coffee.'
        ]);

        // 3. Pastries
        $pastries = Category::firstOrCreate(
            ['slug' => 'pastries'],
            ['name' => 'Pastries', 'image' => 'pastries.png']
        );

        Product::firstOrCreate(['slug' => 'croissant'], [
            'category_id' => $pastries->id,
            'name' => 'Croissant',
            'price' => 3.00,
            'cost' => 1.00,
            'image' => 'croissant.png',
            'description' => 'Buttery flaky pastry.'
        ]);

        Product::firstOrCreate(['slug' => 'chocolate-muffin'], [
            'category_id' => $pastries->id,
            'name' => 'Chocolate Muffin',
            'price' => 3.50,
            'cost' => 1.20,
            'image' => 'chocolate-muffin.png', // Placeholder
            'description' => 'Rich chocolate muffin.'
        ]);

        Product::firstOrCreate(['slug' => 'blueberry-muffin'], [
            'category_id' => $pastries->id,
            'name' => 'Blueberry Muffin',
            'price' => 3.50,
            'cost' => 1.20,
            'image' => 'blueberry-muffin.png', // Placeholder
            'description' => 'Fresh blueberry muffin.'
        ]);

        Product::firstOrCreate(['slug' => 'cinnamon-roll'], [
            'category_id' => $pastries->id,
            'name' => 'Cinnamon Roll',
            'price' => 4.00,
            'cost' => 1.50,
            'image' => 'cinnamon-roll.png', // Placeholder
            'description' => 'Glazed cinnamon roll.'
        ]);

        // 4. Beverages (Water, Juice)
        $beverages = Category::firstOrCreate(
            ['slug' => 'beverages'],
            ['name' => 'Beverages', 'image' => 'beverages.png'] // Placeholder
        );

        Product::firstOrCreate(['slug' => 'bottled-water'], [
            'category_id' => $beverages->id,
            'name' => 'Bottled Water',
            'price' => 2.00,
            'cost' => 0.50,
            'image' => 'water.png', // Placeholder
            'description' => 'Still mineral water.'
        ]);

        Product::firstOrCreate(['slug' => 'sparkling-water'], [
            'category_id' => $beverages->id,
            'name' => 'Sparkling Water',
            'price' => 2.50,
            'cost' => 0.70,
            'image' => 'sparkling-water.png', // Placeholder
            'description' => 'Carbonated mineral water.'
        ]);

        Product::firstOrCreate(['slug' => 'orange-juice'], [
            'category_id' => $beverages->id,
            'name' => 'Orange Juice',
            'price' => 4.00,
            'cost' => 1.50,
            'image' => 'orange-juice.png', // Placeholder
            'description' => 'Freshly squeezed orange juice.'
        ]);
    }
}
