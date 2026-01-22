<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeltronConfig extends Model
{
    use HasFactory;

    protected $table = 'deltron_config';
    protected $primaryKey = 'id_config';
    public $timestamps = false;

    protected $fillable = [
        'base_url',
        'api_user',
        'api_password_enc',
        'token_last',
        'token_expires_at',
        'ip_whitelist',
        'estado',
        'updated_at',
    ];

    protected $casts = [
        'token_expires_at' => 'datetime',
        'estado' => 'boolean',
        'updated_at' => 'datetime',
    ];
}
