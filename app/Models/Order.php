<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'ordenes';
    protected $primaryKey = 'id_orden';
    public $timestamps = true;

    protected $fillable = [
        'id_cliente',
        'creado_por',
        'tipo_orden',     // COTIZACION | PEDIDO
        'estado_orden',   // BORRADOR | CONFIRMADO | ANULADO | ENTREGADO
        'moneda',
        'total',
        'notas',
        'sent_to_customer_at',
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'sent_to_customer_at' => 'datetime',
    ];

    public function cliente()
    {
        return $this->belongsTo(Customer::class, 'id_cliente', 'id_cliente');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'creado_por', 'id_usuario');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'id_orden', 'id_orden');
    }

    public function historial()
    {
        return $this->hasMany(OrderHistory::class, 'id_orden', 'id_orden')->orderBy('fecha', 'desc');
    }

    public function emails()
    {
        return $this->hasMany(OrderEmailLog::class, 'id_orden', 'id_orden')->orderBy('created_at', 'desc');
    }
}
