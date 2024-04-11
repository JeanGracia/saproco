<?php

namespace App\Models\Sigesca\Public;

use App\Models\Sigesca\Public\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sigesca\Public\ProductSolicitud;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solicitud extends Model
{
    use HasFactory;

    protected $connection = 'sigesca';

    protected $table = 'public.solicituds';

    protected $casts = [
        'fecha_ini' => 'date',
        'fecha_fin' => 'date',
        'created_at' => 'date',
        'updated_at' => 'date',
        'deleted_at' => 'date',
    ]; //el campo "ultimo_dia" se debe manejar como una fecha.

    protected $guarded = [
        'id',
        'nro_factura',
        'nro_web'
    ]; // lista negra para proteger los valores de los campos especificados de actualizaciones o borrados


    protected $fillable = [
        'deleted_at',
        'status_id'
    ]; // lista blanca de atributos que se pueden asignar masivamente

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'name');
    }

    public function product_solicitud()
    {
        return $this->hasMany(ProductSolicitud::class, 'product_id', 'user_id', 'deleted_at');
    }
}
