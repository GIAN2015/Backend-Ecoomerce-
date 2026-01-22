<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeltronMapping extends Model
{
    use HasFactory;

    protected $table = 'deltron_mapping';
    protected $primaryKey = 'id_map';
    public $timestamps = false;

    protected $fillable = [
        'tipo',           // BRAND, CATEGORY, SUBCATEGORY, UOM, COLOR, GROUP
        'deltron_value',
        'local_id_int',
        'local_id_varchar',
        'activo',
        'fecha_creacion',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'fecha_creacion' => 'datetime',
    ];
}
