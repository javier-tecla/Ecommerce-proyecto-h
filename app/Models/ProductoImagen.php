<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoImagen extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoImagenFactory> */
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'imagen',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
