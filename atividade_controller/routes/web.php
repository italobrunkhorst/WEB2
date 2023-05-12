<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;

Route::resource('/cidades', 'CidadeController');
