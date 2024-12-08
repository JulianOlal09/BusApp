<div class="container mx-auto p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <!-- Estadísticas generales -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-lg font-bold">Estadísticas Generales</h2>
            <ul class="mt-4">
                <li>Total de Rutas: {{ $totalRutas }}</li>
                <li>Total de Autobuses: {{ $totalAutobuses }}</li>
                <li>Total de Horarios: {{ $totalHorarios }}</li>
            </ul>
        </div>
    </div>

    <!-- CRUD para Rutas -->
    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <h2 class="text-lg font-bold">Gestionar Rutas</h2>
        <button class="bg-blue-500 text-white px-4 py-2 rounded" wire:click="showCreateRouteModal">Crear Ruta</button>
        <ul class="mt-4">
            @foreach($rutas as $ruta)
                <li>{{ $ruta->origen }} - {{ $ruta->destino }}
                    <button wire:click="editRoute({{ $ruta->id }})" class="text-blue-500">Editar</button>
                    <button wire:click="deleteRoute({{ $ruta->id }})" class="text-red-500">Eliminar</button>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- CRUD para Autobuses -->
    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <h2 class="text-lg font-bold">Gestionar Autobuses</h2>
        <button class="bg-blue-500 text-white px-4 py-2 rounded" wire:click="showCreateBusModal">Crear Autobús</button>
        <ul class="mt-4">
            @foreach($autobuses as $autobus)
                <li>{{ $autobus->modelo }} - {{ $autobus->numero_serie }}
                    <button wire:click="editBus({{ $autobus->id }})" class="text-blue-500">Editar</button>
                    <button wire:click="deleteBus({{ $autobus->id }})" class="text-red-500">Eliminar</button>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- CRUD para Horarios -->
    <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-lg font-bold">Gestionar Horarios</h2>
        <button class="bg-blue-500 text-white px-4 py-2 rounded" wire:click="showCreateScheduleModal">Crear Horario</button>
        <ul class="mt-4">
            @foreach($horarios as $horario)
                <li>{{ $horario->ruta->origen }} - {{ $horario->ruta->destino }} a las {{ $horario->hora_salida }}
                    <button wire:click="editSchedule({{ $horario->id }})" class="text-blue-500">Editar</button>
                    <button wire:click="deleteSchedule({{ $horario->id }})" class="text-red-500">Eliminar</button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
