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
        $hotCoffee = Category::create([
            'name' => 'Hot Coffee',
            'slug' => 'hot-coffee',
            'image' => 'hot-coffee.png' 
        ]);

        Product::create([
            'category_id' => $hotCoffee->id,
            'name' => 'Espresso',
            'slug' => 'espresso',
            'price' => 3.00,
            'cost' => 0.50,
            'image' => 'espresso.png',
            'description' => 'Strong and bold concentrated coffee.'
        ]);

        Product::create([
            'category_id' => $hotCoffee->id,
            'name' => 'Cappuccino',
            'slug' => 'cappuccino',
            'price' => 4.50,
            'cost' => 1.20,
            'image' => 'cappuccino.png',
            'description' => 'Espresso with steamed milk and foam.'
        ]);

         Product::create([
            'category_id' => $hotCoffee->id,
            'name' => 'Latte',
            'slug' => 'latte',
            'price' => 4.50,
            'cost' => 1.20,
            'image' => 'latte.png',
            'description' => 'Espresso with steamed milk.'
        ]);


        // 2. Cold Coffee
        $coldCoffee = Category::create([
            'name' => 'Cold Coffee',
            'slug' => 'cold-coffee',
            'image' => 'cold-coffee.png'
        ]);

        Product::create([
            'category_id' => $coldCoffee->id,
            'name' => 'Iced Americano',
            'slug' => 'iced-americano',
            'price' => 3.50,
            'cost' => 0.60,
            'image' => 'iced-americano.png',
            'description' => 'Espresso poured over ice and water.'
        ]);
        
        Product::create([
            'category_id' => $coldCoffee->id,
            'name' => 'Cold Brew',
            'slug' => 'cold-brew',
            'price' => 5.00,
            'cost' => 1.50,
            'image' => 'cold-brew.png',
            'description' => 'Slow-steeped cold coffee.'
        ]);

        // 3. Pastries
        $pastries = Category::create([
            'name' => 'Pastries',
            'slug' => 'pastries',
            'image' => 'pastries.png'
        ]);

        Product::create([
            'category_id' => $pastries->id,
            'name' => 'Croissant',
            'slug' => 'croissant',
            'price' => 3.00,
            'cost' => 1.00,
            'image' => 'croissant.png',
            'description' => 'Buttery flaky pastry.'
        ]);
    }
}
