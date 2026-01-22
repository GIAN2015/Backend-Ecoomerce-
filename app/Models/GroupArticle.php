<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupArticle extends Model
{
    use HasFactory;

    protected $table = 'grupo_articulo';
    protected $primaryKey = 'id_grupoarticulo';
    public $timestamps = false;

    protected $fillable = ['nom_grupo', 'estado_grupo'];
    protected $casts = ['estado_grupo' => 'boolean'];

    public function articulos()
    {
        return $this->hasMany(Product::class, 'id_grupoarticulo', 'id_grupoarticulo');
    }
}
