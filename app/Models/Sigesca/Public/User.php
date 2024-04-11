<?php

namespace App\Models\Sigesca\Public;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sigesca\Public\Solicitud;

class User extends Model
{
    protected $connection = 'sigesca';

    protected $table = 'public.users';

    public function solicitud()
    {
        return $this->hasMany(Solicitud::class, 'user_id', 'id');
    }
}
