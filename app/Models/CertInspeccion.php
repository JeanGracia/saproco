<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertInspeccion extends Model
{
    use HasFactory;

    protected $connection = 'gestion';

    protected $table = 'public.certinspeccion';

    public $timestamps = false;
}
