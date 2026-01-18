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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('unit')->default('kg'); // kg, liters, pcs, packs
            $table->decimal('quantity', 10, 2)->default(0);
            $table->decimal('cost', 10, 2)->default(0); // Cost per unit
            $table->decimal('alert_threshold', 10, 2)->default(5); // Low stock alert
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
