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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->string('type')->default('text'); // text, number, boolean, json
            $table->timestamps();
        });

        // Insert default settings
        $defaults = [
            // Business Settings
            ['key' => 'business_name', 'value' => 'Coffee Shop', 'group' => 'business', 'type' => 'text'],
            ['key' => 'business_address', 'value' => '123 Coffee Street, City', 'group' => 'business', 'type' => 'text'],
            ['key' => 'business_phone', 'value' => '+123 456 7890', 'group' => 'business', 'type' => 'text'],
            ['key' => 'business_email', 'value' => 'info@coffeeshop.com', 'group' => 'business', 'type' => 'text'],
            
            // Tax & Currency
            ['key' => 'tax_rate', 'value' => '10', 'group' => 'tax', 'type' => 'number'],
            ['key' => 'currency_symbol', 'value' => '$', 'group' => 'tax', 'type' => 'text'],
            ['key' => 'currency_position', 'value' => 'before', 'group' => 'tax', 'type' => 'text'],
            
            // Receipt Settings
            ['key' => 'receipt_header', 'value' => 'Thank you for visiting!', 'group' => 'receipt', 'type' => 'text'],
            ['key' => 'receipt_footer', 'value' => 'Please come again!', 'group' => 'receipt', 'type' => 'text'],
            ['key' => 'receipt_show_logo', 'value' => '1', 'group' => 'receipt', 'type' => 'boolean'],
            
            // System Settings
            ['key' => 'low_stock_threshold', 'value' => '10', 'group' => 'system', 'type' => 'number'],
            ['key' => 'auto_print_receipt', 'value' => '0', 'group' => 'system', 'type' => 'boolean'],
        ];

        foreach ($defaults as $setting) {
            DB::table('settings')->insert(array_merge($setting, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
