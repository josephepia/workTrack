<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkTypeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\WorkRecordController;

// Página principal (dashboard)
Route::get('/', function () {
    return view('dashboard'); // Crear una vista llamada "dashboard.blade.php"
})->name('dashboard');

// Rutas para Tipos de Trabajo (WorkType)
Route::resource('work_types', WorkTypeController::class);

// Rutas para Empleados (Employee)
Route::resource('employees', EmployeeController::class);

// Rutas para Registros de Trabajo (WorkRecord)
Route::resource('work_records', WorkRecordController::class);

//Rutas para Lotes (Lot)
Route::resource('lots', LotController::class);