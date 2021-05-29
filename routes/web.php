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
Route::get('/contract/new', [ContractController::class, 'create'])->middleware(['auth'])->name('createContract');
Route::post('/contract/new', [ContractController::class, 'store'])->middleware(['auth'])->name('storeContract');
Route::get('/contract/show/{id}', [ContractController::class, 'show'])->middleware(['auth'])->name('showContract');
Route::post('/contract/delete/{id}', [ContractController::class, 'destroy'])->middleware(['auth'])->name('destroyContract');

//* VEHICULES
Route::get('/vehicules', [VehiculeController::class, 'index'])->middleware(['auth'])->name('vehicules');
Route::get('/vehicule/new', [VehiculeController::class, 'create'])->middleware(['auth'])->name('createVehicule');
Route::get('/vehicule/show/{id}', [VehiculeController::class, 'show'])->middleware(['auth'])->name('showVehicule');

//* CONTROLES
Route::get('/controls', [ControlController::class, 'index'])->middleware(['auth'])->name('controls');

//* EMPLOYES
Route::get('/employes', [EmployeController::class, 'index'])->middleware(['auth'])->name('employes');

//* CLIENTS
Route::get('/clients', [ClientController::class, 'index'])->middleware(['auth'])->name('clients');

require __DIR__ . '/auth.php';
