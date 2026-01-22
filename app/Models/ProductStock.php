<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\HasCompositeKey;

class ProductStock extends Model
{
    use HasFactory, HasCompositeKey;

    protected $table = 'deltron_item_stock_wh';
    public $incrementing = false;
    public $timestamps = false;

    // PK compuesta
    protected $compositeKey = ['item_code', 'whs'];

    protected $fillable = [
        'item_code',
        'whs',
        'stock',
        'last_sync',
    ];

    protected $casts = [
        'stock' => 'integer',
        'last_sync' => 'datetime',
    ];
}
