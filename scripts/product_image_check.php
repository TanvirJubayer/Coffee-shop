<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;

$products = Product::all(['id','name','image']);

$missing = $products->filter(function($p){ return empty($p->image); })->values()->toArray();

$imageCounts = $products->groupBy('image')->filter(function($group){ return $group->count()>1 && !empty($group->first()->image); });
$duplicates = [];
foreach($imageCounts as $image=>$group){
    foreach($group as $p){
        $duplicates[] = $p->only(['id','name','image']);
    }
}

echo json_encode(['missing'=>$missing,'duplicates'=>$duplicates]);
?>
