<?php

namespace App\Models\Sigesca\Solicitud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $connection = 'sigesca';

    protected $table = 'public.empresas';
}
