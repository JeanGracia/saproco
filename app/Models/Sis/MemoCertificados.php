<?php

namespace App\Models\Sis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoCertificados extends Model
{
    use HasFactory;

    protected $connection = 'sis';

    protected $table = 'gestion.memocertificados';

    protected $primaryKey = 'idmemocertificados';
}
