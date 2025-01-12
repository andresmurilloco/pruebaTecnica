<?php

namespace App\Repositories;

use App\Models\Usuarios;

class UserRepository
{
    public function create(array $data)
{
    return Usuarios::create($data);
}


public function update($id, array $data)
{
    $user = Usuarios::find($id);
    
    // Si el usuario existe, actualiza los datos
    if ($user) {
        $user->update($data);
        return $user;
    }

    // Si no se encuentra el usuario, puedes devolver un error o null
    return null;
}


    public function getById($id)
    {
        return Usuarios::find($id);
    }

    public function getAll()
    {
        return Usuarios::all();
    }
}
