<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'method',
        'type',
        'current_stock',
        'reorder_threshold',
        'base_price',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
