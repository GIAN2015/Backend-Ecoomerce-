<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'marca';
    protected $primaryKey = 'id_marca';
    public $timestamps = false;

    protected $fillable = ['nom_marca', 'estado_marca'];
    protected $casts = ['estado_marca' => 'boolean'];

    public function articulos()
    {
        return $this->hasMany(Product::class, 'id_marca', 'id_marca');
    }
}
