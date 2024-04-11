<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultatecnica extends Model
{
    use HasFactory;

    protected $connection = 'gestion';

    protected $table = 'public.consultatecnica';

    /* Por defecto, Eloquent asume que la clave primaria de la tabla es "id", pero si el nombre real de la clave primaria en la tabla es diferente, como en este caso "idct", es necesario especificarlo explícitamente */
    protected $primaryKey = 'idct';

    public $timestamps = false;
}
