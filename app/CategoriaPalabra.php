<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaPalabra extends Model
{
    protected $table = 'categoria_palabra';
    protected $primaryKey = 'id_categoria_palabra';

    protected $fillable = [
        'id_categoria_palabra',
        'fid_categoria',
        'fid_palabra'
    ];
}
