<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitMeasure extends Model
{
    use HasFactory;

    protected $table = 'unidad_medida';
    protected $primaryKey = 'id_um';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['id_um', 'nom_um', 'estado_um'];
    protected $casts = ['estado_um' => 'boolean'];

    public function articulos()
    {
        return $this->hasMany(Product::class, 'id_unidadmedida', 'id_um');
    }
}
