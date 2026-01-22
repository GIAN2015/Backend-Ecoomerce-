<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeltronItemFeatureCache extends Model
{
    use HasFactory;

    protected $table = 'deltron_item_feature_cache';
    protected $primaryKey = 'item_code';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['item_code', 'feature_html', 'last_sync'];

    protected $casts = [
        'last_sync' => 'datetime',
    ];
}
