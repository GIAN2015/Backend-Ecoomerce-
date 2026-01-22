<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'articulo_imagen';
    protected $primaryKey = 'id_img';
    public $timestamps = false;

    protected $fillable = [
        'id_articulo',
        'tipo',
        'url',
        'orden',
    ];

    public function articulo()
    {
        return $this->belongsTo(Product::class, 'id_articulo', 'id_articulo');
    }
}
