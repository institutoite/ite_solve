<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionIteSolveController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/division', [DivisionIteSolveController::class, 'index'])->name('division.index');
Route::any('/dividir', [DivisionIteSolveController::class, 'dividir'])->name('division.dividir');
Route::get('/historial', [DivisionIteSolveController::class, 'historial'])->name('division.historial');
//Route::post('/navegar', [DivisionIteSolveController::class, 'navegar'])->name('division.navegar');
Route::match(['get', 'post'], '/navegar', [DivisionIteSolveController::class, 'navegar'])->name('division.navegar');
