<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de API
|--------------------------------------------------------------------------
|
| Aquí puedes registrar todas las rutas de tu aplicación que se encargan
| de manejar las solicitudes API. Estas rutas están protegidas por el
| middleware `auth:sanctum`, que garantiza que solo los usuarios
| autenticados puedan acceder a las rutas protegidas.
|
*/

// Ruta para el registro de un nuevo usuario
Route::post('register', [AuthController::class, 'register']);

// Ruta para el inicio de sesión (login), donde se crea un token para el usuario
Route::post('login', [AuthController::class, 'login']);

// Ruta protegida para cerrar sesión (logout), solo accesible para usuarios autenticados
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

// Ruta protegida para obtener los datos del usuario autenticado
Route::middleware('auth:sanctum')->get('user', function () {
    return response()->json(auth()->user());
});
