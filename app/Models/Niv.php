<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niv extends Model
{
    use HasFactory;

    protected $connection = 'gestion';

    protected $table = 'public.niv';

    public $timestamps = false;
}
