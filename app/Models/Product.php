<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'articulos';
    protected $primaryKey = 'id_articulo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'id_articulo',
        'origen', // DELTRON | PROPIO
        'id_marca',
        'modelo',
        'id_color',
        'partnumber',
        'nom_articulo',
        'id_unidadmedida',
        'id_grupoarticulo',
        'id_categoria',
        'id_subcategoria',
        'imagen_articulo',
        'ficha_tecnica',
        'peso',
        'unpeso',
        'moneda',
        'precio_deltron',
        'precio_publico',
        'stock_total',
        'deltron_minicode',
        'deltron_last_sync',
        'deltron_raw',
        'id_usuario',
        'estado_articulo',
    ];

    protected $casts = [
        'peso' => 'decimal:2',
        'precio_deltron' => 'decimal:2',
        'precio_publico' => 'decimal:2',
        'estado_articulo' => 'boolean',
        'deltron_last_sync' => 'datetime',
        'deltron_raw' => 'array',
    ];

    // Relaciones
    public function marca()
    {
        return $this->belongsTo(Brand::class, 'id_marca', 'id_marca');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'id_color', 'id_color');
    }

    public function unidadMedida()
    {
        return $this->belongsTo(UnitMeasure::class, 'id_unidadmedida', 'id_um');
    }

    public function grupo()
    {
        return $this->belongsTo(GroupArticle::class, 'id_grupoarticulo', 'id_grupoarticulo');
    }

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'id_categoria', 'id_categoria');
    }

    public function subcategoria()
    {
        return $this->belongsTo(SubCategory::class, 'id_subcategoria', 'id_subcategoria');
    }

    public function creadoPor()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    public function metas()
    {
        return $this->hasMany(ProductMeta::class, 'id_articulo', 'id_articulo');
    }

    public function imagenes()
    {
        return $this->hasMany(ProductImage::class, 'id_articulo', 'id_articulo')->orderBy('orden');
    }

    public function detallesOrden()
    {
        return $this->hasMany(OrderItem::class, 'id_articulo', 'id_articulo');
    }

    // Scopes
    public function scopeActivos($q)
    {
        return $q->where('estado_articulo', 1);
    }

    public function scopeDeltron($q)
    {
        return $q->where('origen', 'DELTRON');
    }

    public function scopePropios($q)
    {
        return $q->where('origen', 'PROPIO');
    }
}
