<?php

use App\Http\Controllers\VeterinarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('templates.main')->with('titulo', "");
})->name('index');

Route::resource('clientes', 'ClienteController');
Route::resource('veterinarios', 'VeterinarioController');
