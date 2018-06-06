<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progreso extends Model
{
    protected $table = 'progreso';
    protected $primaryKey =  'id_vista';
    public $timestamps = false;
    protected $fillable = [
        'fid_palabra',
        'fid_usuario',
        'vista_respuesta'

    ];
}
