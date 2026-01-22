<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeltronSyncRun extends Model
{
    use HasFactory;

    protected $table = 'deltron_sync_runs';
    protected $primaryKey = 'id_sync';
    public $timestamps = false;

    protected $fillable = [
        'tipo',               // ITEMREQUEST | ITEMPRICE | ITEMSTOCK | ITEMFEATURE
        'flag_actualizacion',
        'page_inicio',
        'page_fin',
        'size_pag',
        'status',             // RUNNING | OK | FAIL
        'items_procesados',
        'error_msg',
        'started_at',
        'finished_at',
    ];

    protected $casts = [
        'flag_actualizacion' => 'boolean',
        'items_procesados' => 'integer',
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];
}
