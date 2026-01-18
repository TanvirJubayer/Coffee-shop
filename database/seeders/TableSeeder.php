<?php

namespace Database\Seeders;

use App\Models\RestaurantTable;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Internal Tables
        RestaurantTable::create(['name' => 'Table 1', 'capacity' => 2, 'status' => 'available']);
        RestaurantTable::create(['name' => 'Table 2', 'capacity' => 2, 'status' => 'available']);
        RestaurantTable::create(['name' => 'Table 3', 'capacity' => 4, 'status' => 'available']);
        RestaurantTable::create(['name' => 'Table 4', 'capacity' => 4, 'status' => 'available']);
        RestaurantTable::create(['name' => 'Table 5', 'capacity' => 6, 'status' => 'available']);

        // Window Seats
        RestaurantTable::create(['name' => 'Window 1', 'capacity' => 2, 'status' => 'available']);
        RestaurantTable::create(['name' => 'Window 2', 'capacity' => 2, 'status' => 'available']);

        // Patio
        RestaurantTable::firstOrCreate(['name' => 'Patio 1'], ['capacity' => 4, 'status' => 'available']);
        RestaurantTable::firstOrCreate(['name' => 'Patio 2'], ['capacity' => 4, 'status' => 'available']);
        RestaurantTable::firstOrCreate(['name' => 'Patio 3'], ['capacity' => 4, 'status' => 'available']);
        RestaurantTable::firstOrCreate(['name' => 'Patio 4'], ['capacity' => 6, 'status' => 'available']);
        RestaurantTable::firstOrCreate(['name' => 'Patio 5'], ['capacity' => 2, 'status' => 'available']);

        // More Windows
        RestaurantTable::firstOrCreate(['name' => 'Window 3'], ['capacity' => 2, 'status' => 'available']);
        RestaurantTable::firstOrCreate(['name' => 'Window 4'], ['capacity' => 2, 'status' => 'available']);
        RestaurantTable::firstOrCreate(['name' => 'Window 5'], ['capacity' => 4, 'status' => 'available']);
    }
}
