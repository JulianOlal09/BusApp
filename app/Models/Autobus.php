<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autobus extends Model
{
    use HasFactory;

    protected $fillable = ['numero_serie', 'modelo', 'capacidad', 'sucursal_id'];

    // Relación inversa con Sucursal (un autobús pertenece a una sucursal)
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    // Relación uno a muchos con los horarios
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}
