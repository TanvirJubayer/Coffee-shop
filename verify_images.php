<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;

$products = Product::whereIn('id', [1, 4, 5, 8])->get();

foreach($products as $product) {
    echo "ID: {$product->id}\n";
    echo "Name: {$product->name}\n";
    echo "Image: {$product->image}\n";
    echo "URL: {$product->image_url}\n";
    echo "--------------------------\n";
}
