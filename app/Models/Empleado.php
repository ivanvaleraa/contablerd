<?php

namespace App\Models;

use App\Models\Catalogos\TipoEmpleado;
use App\Models\Catalogos\Departamento;
use App\Models\Catalogos\Cargo;
use App\Models\Catalogos\Nomina;
use App\Models\Catalogos\TipoPagoNomina;
use App\Models\Catalogos\EstCivil;
use App\Models\Catalogos\Banco;
use App\Models\Catalogos\ARS;
use App\Models\Catalogos\AFP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = ['nombre',
        'apellido',
        'cedula',
        'fecha_nacimiento',
        'fecha_ingreso',
        'id_nivel_academico',
        'id_estado_civil',
        'celular',
        'telefono',
        'id_departamento',
        'id_cargo',
        'id_horario',
        'id_tipo_empleado',
        'inicio_afp',
        'inicio_ars',
        'id_tipo_pago_nomina',
        'id_nomina',
        'sueldo',
        'referencia',
        'cuenta_contable',
        'id_ars',
        'id_afp',
        'cuenta_electronica',
        'id_banco',

        'ars_empleado',
        'ars_aporte',
        'afp_empleado',
        'afp_aporte',
        'arl_aporte'];

    use HasFactory;

    public function afp(){
        return $this->hasOne(AFP::class,'id','id_afp');
    }

    public function ars(){
        return $this->hasOne(ARS::class,'id','id_ars');
    }

    public function banco(){
        return $this->hasOne(Banco::class,'id','id_banco');
    }

    public function cargo(){
        return $this->hasOne(Cargo::class,'id','id_cargo');
    }

    public function departamento(){
        return $this->hasOne(Departamento::class,'id','id_departamento');
    }

    public function estado_civil(){
        return $this->hasOne(EstCivil::class,'id','id_estado_civil');
    }

    public function horario(){
        return $this->hasOne(Horario::class,'id','id_horario');
    }

    public function nivel_academico(){
        return $this->hasOne(NivelAcademico::class,'id','id_nivel_academico');
    }

    public function nomina(){
        return $this->hasOne(Nomina::class,'id','id_nomina');
    }

    public function tipo_pago_nomina(){
        return $this->hasOne(TipoPagoNomina::class,'id','id_tipo_pago_nomina');
    }

    public function tipo_empleado(){
        return $this->hasOne(TipoEmpleado::class,'id','id_tipo_empleado');
    }

}
