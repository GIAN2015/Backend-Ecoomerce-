<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderEmailLog extends Model
{
    use HasFactory;

    // si tu tabla se llama order_email_logs cámbialo aquí:
    protected $table = 'orden_emails';
    protected $primaryKey = 'id_email';
    public $timestamps = true;

    protected $fillable = [
        'id_orden',
        'para_email',
        'asunto',
        'estado',              // EN_COLA | ENVIADO | FALLO
        'enviado_at',
        'provider_message_id',
        'error_msg',
    ];

    protected $casts = [
        'enviado_at' => 'datetime',
    ];

    public function orden()
    {
        return $this->belongsTo(Order::class, 'id_orden', 'id_orden');
    }
}
