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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained(); // Staff creating order
            $table->foreignId('table_id')->nullable()->after('user_id')->constrained('restaurant_tables');
            $table->string('type')->default('dine_in')->after('status'); // dine_in, takeaway
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['table_id']);
            $table->dropColumn('table_id');
            $table->dropColumn('type');
        });
    }
};
