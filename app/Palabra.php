<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palabra extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'palabra';
    protected $primaryKey = 'id_palabra';

    protected $fillable = [
        'palabra',
        'palabra_tipo',
        'palabra_significado',
        'palabra_usos',
        'palabra_imagen',
        'palabra_audio',
        'palabra_dificultad'
    ];

}
