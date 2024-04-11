<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eficiencia extends Model
{
    use HasFactory;

    protected $connection = 'gestion';

    protected $table = 'public.eficiencia';

    public $timestamps = false;
}
