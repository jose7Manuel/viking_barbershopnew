<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function create(Request $request)
{
    $request->validate([
        'nombre_completo' => 'required|string|min:3|max:255',
        'email' => 'required|email|unique:clients,email',
        'telefono' => 'required|string|max:20|unique:clients,phone',
        'contraseña' => 'required|string|min:8|confirmed',
    ]);

    $client = Client::create([
        'nombre_completo' => $request->full_name,
        'email' => $request->email,
        'telefono' => $request->phone,
        'contraseña' => bcrypt($request->password),
    ]);

    return response()->json($client, 201);
}

}

