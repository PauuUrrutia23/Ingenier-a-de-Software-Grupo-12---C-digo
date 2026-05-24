<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------------------
// Rutas públicas de autenticación
// -------------------------------------------------------------------------

Route::post('/login', [AuthController::class, 'login'])
    ->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout')
    ->middleware('admin.auth');

// -------------------------------------------------------------------------
// Rutas protegidas del panel de administración
// Todas las rutas bajo /admin requieren sesión activa válida.
// -------------------------------------------------------------------------

Route::prefix('admin')
    ->middleware('admin.auth')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Registrar aquí el resto de rutas del panel de gestión
    });
