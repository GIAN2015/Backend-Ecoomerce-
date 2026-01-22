<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = true;

    protected $fillable = [
        'id_empleado',
        'nomape_usuario',
        'username_usuario',
        'mail_usuario',
        'password_hash',
        'rol_usuario',
        'requiere_cambio_password',
        'estado_usuario',
        'ultimo_login',
    ];

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    protected $casts = [
        'requiere_cambio_password' => 'boolean',
        'estado_usuario' => 'boolean',
        'ultimo_login' => 'datetime',
    ];

    // Relaciones
    public function articulos()
    {
        return $this->hasMany(Product::class, 'id_usuario', 'id_usuario');
    }

    public function ordenesCreadas()
    {
        return $this->hasMany(Order::class, 'creado_por', 'id_usuario');
    }
}
