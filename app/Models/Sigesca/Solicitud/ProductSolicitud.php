<?php

namespace App\Models\Sigesca\Solicitud;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sigesca\Solicitud\Solicitud;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSolicitud extends Model
{
    use HasFactory;

    protected $connection = 'sigesca';

    protected $table = 'public.product_solicitud';

    protected $guarded = [
        'id',
        'product_id',
        'solicitud_id',
        'service_id',
        'calibracion_id',
        'criterio_id'
    ]; // lista negra para proteger los campos especificados de borrados o actualizaciones

    protected $fillable = [
        'deleted_at'
    ]; //lista blanca de campos que pueden ser actualizados

    public $timestamps = false;

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }
}
