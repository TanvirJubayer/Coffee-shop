<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'type',
        'value',
        'min_order',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
        'value' => 'decimal:2',
        'min_order' => 'decimal:2',
    ];

    /**
     * Check if the discount is valid.
     */
    public function isValid($orderTotal = 0)
    {
        if (!$this->is_active) {
            return false;
        }

        $now = Carbon::now()->startOfDay();

        if ($this->start_date && $now->lt($this->start_date)) {
            return false;
        }

        if ($this->end_date && $now->gt($this->end_date)) {
            return false;
        }

        if ($this->min_order > 0 && $orderTotal < $this->min_order) {
            return false;
        }

        return true;
    }

    /**
     * Calculate discount amount.
     */
    public function calculateDiscount($total)
    {
        if ($this->type === 'percentage') {
            return $total * ($this->value / 100);
        }

        return min($this->value, $total);
    }
}
