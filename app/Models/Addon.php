<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'category_id', 'is_available'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
