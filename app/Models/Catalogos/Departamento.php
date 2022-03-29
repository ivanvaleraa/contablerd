<?php

namespace App\Models\Catalogos;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';
    use HasFactory;

    public function empleados(){
        return $this->hasMany(Empleado::class);
    }
}
