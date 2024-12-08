<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'direccion', 'telefono'];

    // Relación uno a muchos con las rutas
    public function rutas()
    {
        return $this->hasMany(Ruta::class);
    }

    // Relación uno a muchos con los autobuses
    public function autobuses()
    {
        return $this->hasMany(Autobus::class);
    }
}

