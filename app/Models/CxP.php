<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CxP extends Model
{
    protected $table = 'cuenta_por_pagar';
    protected $fillable = ['id_suplidor',
        'fecha',
        'id_condicion',
        'ncf',
        'factura',
        'fecha_factura',
        'fecha_vencimiento',
        'bruto',
        'itbis',
        'descuento',
        'otros',
        'concepto'];
    use HasFactory;

    public function suplidor(){
        return $this->hasOne(Suplidor::class,'id','id_suplidor');
    }

    public function cat_condicion_pago(){
        return $this->hasOne(CondicionPago::class,'id','id_condicion');
    }
}
