<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'price',
        'cost',
        'image',
        'description',
        'status',
        'quantity',
        'alert_threshold'
    ];

    /**
     * The accessors to append to the model's array form.
     */
    protected $appends = ['image_url'];

    /**
     * Get the full URL for the product image.
     * This accessor ensures images work even when project is moved.
     */
    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/placeholder.svg');
        }
        
        // Check if storage link exists and file exists
        $storagePath = storage_path('app/public/products/' . $this->image);
        if (file_exists($storagePath)) {
            return asset('storage/products/' . $this->image);
        }

        // Check if file exists in public/images/products
        $publicPath = public_path('images/products/' . $this->image);
        if (file_exists($publicPath)) {
            return asset('images/products/' . $this->image);
        }
        
        // Fallback to placeholder if image not found
        return asset('images/placeholder.svg');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function inventoryTransactions()
    {
        return $this->hasMany(InventoryTransaction::class);
    }
}
