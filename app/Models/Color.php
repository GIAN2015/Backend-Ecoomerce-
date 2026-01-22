<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;

    protected $table = 'color';
    protected $primaryKey = 'id_color';
    public $timestamps = false;

    protected $fillable = ['nom_color', 'estado_color'];
    protected $casts = ['estado_color' => 'boolean'];

    public function articulos()
    {
        return $this->hasMany(Product::class, 'id_color', 'id_color');
    }
}
