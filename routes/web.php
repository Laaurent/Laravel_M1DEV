<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ControlController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backoffice.dashboard');
})->middleware(['auth'])->name('dashboard');
//* CONTRATS
Route::get('/contracts', [ContractController::class, 'index'])->middleware(['auth'])->name('contracts');

//* VEHICULES
Route::get('/vehicules', [VehiculeController::class, 'index'])->middleware(['auth'])->name('vehicules');

//* CONTROLES
Route::get('/controls', [ControlController::class, 'index'])->middleware(['auth'])->name('controls');

//* EMPLOYES
Route::get('/employes', [EmployeController::class, 'index'])->middleware(['auth'])->name('employes');

//* CLIENTS
Route::get('/clients', [ClientController::class, 'index'])->middleware(['auth'])->name('clients');

require __DIR__.'/auth.php';
