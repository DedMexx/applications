<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ClientController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your Client. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [ClientController::class, 'create'])
    ->name('client.create');

Route::post('/client', [ClientController::class, 'store'])
    ->name('client.store');

Route::middleware('guest')->group(function () {
    Route::get('/manager', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/manager', [AuthenticatedSessionController::class, 'store'])
        ->name('login.check');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [ClientController::class, 'index'])
        ->name('client.index');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/client/{client}/edit', [ClientController::class, 'edit'])
        ->whereNumber('client')
        ->name('client.edit');

    Route::put('/client/{client}', [ClientController::class, 'update'])
        ->whereNumber('client')
        ->name('client.update');
});
