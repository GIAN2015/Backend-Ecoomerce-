<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeltronItemCache extends Model
{
    use HasFactory;

    protected $table = 'deltron_item_cache';
    protected $primaryKey = 'item_code';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['item_code', 'payload', 'last_sync', 'activo'];

    protected $casts = [
        'payload' => 'array',
        'last_sync' => 'datetime',
        'activo' => 'boolean',
    ];
}
