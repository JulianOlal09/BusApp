<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['ruta_id', 'autobus_id', 'hora_salida'];

    // Relación inversa con Ruta (un horario pertenece a una ruta)
    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }

    // Relación inversa con Autobus (un horario pertenece a un autobús)
    public function autobus()
    {
        return $this->belongsTo(Autobus::class);
    }
}
