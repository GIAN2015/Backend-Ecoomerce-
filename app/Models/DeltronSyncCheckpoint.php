<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeltronSyncCheckpoint extends Model
{
    use HasFactory;

    protected $table = 'deltron_sync_checkpoints';
    protected $primaryKey = 'id_checkpoint';
    public $timestamps = false;

    protected $fillable = [
        'tipo',              // ITEMREQUEST | ITEMPRICE | ITEMSTOCK | ITEMFEATURE
        'flag_actualizacion',
        'size_pag',
        'last_page_ok',
        'last_item_code',
        'last_started_at',
        'last_finished_at',
        'last_status',       // OK | FAIL | RUNNING
        'last_error',
        'updated_at',
    ];

    protected $casts = [
        'flag_actualizacion' => 'boolean',
        'size_pag' => 'integer',
        'last_page_ok' => 'integer',
        'last_started_at' => 'datetime',
        'last_finished_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
