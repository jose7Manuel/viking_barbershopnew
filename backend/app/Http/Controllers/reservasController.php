<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reservasController extends Controller
{
  public function store(Request $request)
{
    $request->validate([
        'telefono' => 'required|exists:clients,phone',
        'contraseña' => 'required|string',
        'nombre_completo' => 'required|string|max:255',
        'fecha' => 'required|date|after:now',
    ]);

    $client = Client::where('phone', $request->phone)->first();
    if (!Hash::check($request->password, $client->password)) {
        return response()->json(['message' => 'Contraseña incorrecta'], 400);
    }

    $reservation = Reservation::create([
        'cliente_id' => $client->id,
        'servicio' => $request->service_name,
        'fecha' => $request->scheduled_at,
        'estado' => 'pending',
    ]);

    return response()->json($reservation, 201);
}

}
