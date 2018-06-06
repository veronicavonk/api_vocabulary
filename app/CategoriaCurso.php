<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaCurso extends Model
{

    protected $table = 'categoria_curso';
    protected $primaryKey = 'id_categoria_curso';

    protected $fillable = [
        'fid_curso',
        'fid_categoria'
    ];
}
