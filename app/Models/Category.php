<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    public $timestamps = false;

    protected $fillable = ['nom_categoria', 'estado_categoria'];
    protected $casts = ['estado_categoria' => 'boolean'];

    public function subcategorias()
    {
        return $this->hasMany(SubCategory::class, 'id_categoria', 'id_categoria');
    }

    public function articulos()
    {
        return $this->hasMany(Product::class, 'id_categoria', 'id_categoria');
    }
}
