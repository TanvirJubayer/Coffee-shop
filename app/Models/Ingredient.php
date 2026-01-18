<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'unit',
        'quantity',
        'cost',
        'alert_threshold',
    ];

    /**
     * Get the low stock status.
     */
    public function getIsLowStockAttribute()
    {
        return $this->quantity <= $this->alert_threshold;
    }
}
