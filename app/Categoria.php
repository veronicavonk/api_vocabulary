<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        'categoria_nombre',
        'categoria_imagen'
    ];
}
