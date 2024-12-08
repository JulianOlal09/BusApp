<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Registro de un nuevo usuario
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Crear el token de acceso
        $token = $user->createToken('YourAppName')->plainTextToken;

        // Devolver el token al cliente
        return response()->json(['token' => $token], 201);
    }

    // Iniciar sesión (login)
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Buscar el usuario por correo
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        // Crear el token de acceso
        $token = $user->createToken('YourAppName')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    // Cerrar sesión (logout)
    public function logout(Request $request)
    {
        // Revocar todos los tokens del usuario
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'Cierre de sesión exitoso'], 200);
    }
}
