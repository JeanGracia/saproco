<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $connection = 'factura';

    protected $table = 'public.clientes';

    /* Por defecto, Eloquent asume que la clave primaria de la tabla es "id", pero si el nombre real de la clave primaria en la tabla es diferente, como en este caso "id_cliente", es necesario especificarlo explícitamente */
    protected $primaryKey = 'id_cliente';
}
