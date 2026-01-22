<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderHistory extends Model
{
    use HasFactory;

    protected $table = 'orden_historial';
    protected $primaryKey = 'id_hist';
    public $timestamps = false;

    protected $fillable = [
        'id_orden',
        'estado_anterior',
        'estado_nuevo',
        'cambiado_por',
        'comentario',
        'fecha',
    ];

    protected $casts = [
        'fecha' => 'datetime',
    ];

    public function orden()
    {
        return $this->belongsTo(Order::class, 'id_orden', 'id_orden');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'cambiado_por', 'id_usuario');
    }
}
