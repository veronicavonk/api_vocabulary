<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    
    protected $fillable = [
        'usuario_nombre',
        'usuario_email',
        'usuario_telefono',
        'usuario_usuario',
        'usuario_password',
        'usuario_rol',
        'usuario_pais',
        'usuario_genero',
        'usuario_fecha_nacimiento',
        'usuario_acerca',
        'usuario_foto',
        'usuario_token',
    ];
}
