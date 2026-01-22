<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categoria';
    protected $primaryKey = 'id_subcategoria';
    public $timestamps = false;

    protected $fillable = ['id_categoria', 'nom_subcategoria', 'estado_subcategoria'];
    protected $casts = ['estado_subcategoria' => 'boolean'];

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'id_categoria', 'id_categoria');
    }

    public function articulos()
    {
        return $this->hasMany(Product::class, 'id_subcategoria', 'id_subcategoria');
    }
}
