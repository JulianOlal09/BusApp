<?php

namespace App\Http\Livewire;

use App\Models\Ruta;
use App\Models\Autobus;
use App\Models\Horario;
use Livewire\Component;

class Dashboard extends Component
{
    public $rutas, $autobuses, $horarios;
    public $totalRutas, $totalAutobuses, $totalHorarios;

    public function mount()
    {
        // Cargar estadísticas generales
        $this->totalRutas = Ruta::count();
        $this->totalAutobuses = Autobus::count();
        $this->totalHorarios = Horario::count();

        // Cargar las rutas, autobuses y horarios
        $this->rutas = Ruta::all();
        $this->autobuses = Autobus::all();
        $this->horarios = Horario::all();
    }

    // Métodos para manejar el CRUD (Crear, Editar, Eliminar) de Rutas, Autobuses y Horarios

    // Crear una nueva Ruta (modal de creación)
    public function showCreateRouteModal()
    {
        // Aquí iría la lógica para mostrar el modal de creación de rutas
    }

    // Editar una Ruta
    public function editRoute($id)
    {
        // Aquí iría la lógica para editar una ruta
    }

    // Eliminar una Ruta
    public function deleteRoute($id)
    {
        Ruta::find($id)->delete();
        $this->mount(); // Recargar el listado después de eliminar
    }

    // Métodos similares para Autobuses y Horarios...

    public function render()
    {
        return view('livewire.dashboard');
    }
}

