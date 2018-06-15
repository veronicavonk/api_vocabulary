<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class Usuario extends Model
class Usuario extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;
    
    // protected $fillable = [
    //     'usuario_nombre',
    //     'usuario_email',
    //     'usuario_telefono',
    //     'usuario_usuario',
    //     'usuario_password',
    //     'usuario_rol',
    //     'usuario_pais',
    //     'usuario_genero',
    //     'usuario_fecha_nacimiento',
    //     'usuario_acerca',
    //     'usuario_foto',
    //     'usuario_token',
    // ];

  protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'usuario',
        'password',
        'pais',
        'genero',
        'fecha_nacimiento',
        'verificado'
    ];


    

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
