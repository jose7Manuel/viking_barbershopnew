<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('clients', [ClientController::class, 'create']);
Route::post('reservations', [ReservationController::class, 'store']);

