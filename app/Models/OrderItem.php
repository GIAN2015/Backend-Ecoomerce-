<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'orden_detalle';
    protected $primaryKey = 'id_detalle';
    public $timestamps = true;

    protected $fillable = [
        'id_orden',
        'id_articulo',
        'cantidad',
        'precio_unit',
        'descuento',
        'subtotal',
        // recomendado (si lo agregas en migración): 'snapshot'
    ];

    protected $casts = [
        'cantidad' => 'integer',
        'precio_unit' => 'decimal:2',
        'descuento' => 'decimal:2',
        'subtotal' => 'decimal:2',
        // 'snapshot' => 'array',
    ];

    public function orden()
    {
        return $this->belongsTo(Order::class, 'id_orden', 'id_orden');
    }

    public function articulo()
    {
        return $this->belongsTo(Product::class, 'id_articulo', 'id_articulo');
    }
}
