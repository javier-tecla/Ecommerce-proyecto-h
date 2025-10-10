<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    protected $table = 'ajustes';

    protected $fillable = [
        'nombre',
        'descripcion',
        'sucursal',
        'direccion',
        'telefonos',
        'logo',
        'imagem_login',
        'email',
        'divisa',
        'pagina_web',
    ];
}
