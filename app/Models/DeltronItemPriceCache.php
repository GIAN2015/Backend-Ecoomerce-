<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeltronItemPriceCache extends Model
{
    use HasFactory;

    protected $table = 'deltron_item_price_cache';
    protected $primaryKey = 'item_code';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['item_code', 'price', 'currency_cod', 'last_sync'];

    protected $casts = [
        'price' => 'decimal:2',
        'last_sync' => 'datetime',
    ];
}
