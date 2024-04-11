<?php

namespace App\Models\Sigesca\Public;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $connection = 'sigesca';

    protected $table = 'public.empresas';
}
