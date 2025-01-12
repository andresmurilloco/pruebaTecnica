<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(Request $request)
{
    $data = [
        'nombre' => 'Juan Pérez',
        'correo' => 'juan.perez@example.com',
        'saldo' => 1000,
    ];

    $user = $this->userService->createUser($data);
    return response()->json($user, 201);

}

public function update($id, Request $request)
{
    // Validación de los datos recibidos
    $data = $request->validate([
        'nombre' => 'required|string|max:255',
        'correo' => 'required|email|unique:usuarios,correo,' . $id,
        'saldo' => 'required|numeric',
    ]);

    // Llamada al servicio para actualizar el usuario
    $user = $this->userService->updateUser($id, $data);

    // Retornar la respuesta
    return response()->json($user);
}

}
