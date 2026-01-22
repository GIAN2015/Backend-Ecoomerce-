<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = true;

    protected $fillable = [
        'tipo_doc',
        'nro_doc',
        'nombres',
        'email',
        'telefono',
        'direccion',
        'estado_cliente',
    ];

    protected $casts = [
        'estado_cliente' => 'boolean',
    ];

    public function ordenes()
    {
        return $this->hasMany(Order::class, 'id_cliente', 'id_cliente');
    }
}
