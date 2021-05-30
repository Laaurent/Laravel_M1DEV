<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ControlController;

use App\Models\Contract;

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
    if(Auth::check()){
        return redirect()->route('dashboard');
    }
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $contracts = Contract::where('id_client',Auth::id())->get();

        return view('backoffice.dashboard',[
            'contracts' => $contracts
        ]);
    })->name('dashboard');

    //* CONTRATS
    Route::get('/contract/show/{id}', [ContractController::class, 'show'])->name('showContract');
    Route::get('/contract/new', [ContractController::class, 'create'])->name('createContract');
    Route::post('/contract/new', [ContractController::class, 'store'])->name('storeContract');

    //* VEHICULES
    Route::get('/vehicules', [VehiculeController::class, 'index'])->name('vehicules');
    Route::get('/vehicule/show/{id}', [VehiculeController::class, 'show'])->name('showVehicule');

    //* CONTROLES

    //* EMPLOYES

    //* CLIENTS
    Route::get('/client/show/{id}', [ClientController::class, 'show'])->middleware(['client'])->name('showClient');
    Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->middleware(['client'])->name('editClient');
    Route::post('/client/edit/{id}', [ClientController::class, 'update'])->middleware(['client'])->name('updateClient');

    Route::middleware(['employe'])->group(function () {
        //* CONTRATS
        Route::get('/contracts', [ContractController::class, 'index'])->name('contracts');
        Route::get('/contract/edit/{id}', [ContractController::class, 'edit'])->name('editContract');
        Route::post('/contract/edit/{id}', [ContractController::class, 'update'])->name('updateContract');
        Route::post('/contract/delete/{id}', [ContractController::class, 'destroy'])->name('destroyContract');

        //* VEHICULES
        Route::get('/vehicule/new', [VehiculeController::class, 'create'])->name('createVehicule');
        Route::post('/vehicule/new', [VehiculeController::class, 'store'])->name('storeVehicule');
        Route::get('/vehicule/edit/{id}', [VehiculeController::class, 'edit'])->name('editVehicule');
        Route::post('/vehicule/edit/{id}', [VehiculeController::class, 'update'])->name('updateVehicule');
        Route::post('/vehicule/delete/{id}', [VehiculeController::class, 'destroy'])->name('destroyVehicule');

        //* CONTROLES
        Route::get('/controls', [ControlController::class, 'index'])->name('controls');
        Route::get('/control/conformite/vehicule/{id}/new', [ControlController::class, 'createConf'])->name('createConformity');
        Route::post('/control/conformite/vehicule/{id}/new', [ControlController::class, 'storeConf'])->name('storeConformity');
        Route::get('/control/etat/vehicule/{id}/new', [ControlController::class, 'createState'])->name('createState');
        Route::post('/control/etat/vehicule/{id}/new', [ControlController::class, 'storeState'])->name('storeState');

        //* EMPLOYES
        Route::get('/employes', [EmployeController::class, 'index'])->name('employes');
        Route::get('/employe/show/{id}', [EmployeController::class, 'show'])->name('showEmploye');
        Route::get('/employe/new', [EmployeController::class, 'create'])->name('createEmploye');
        Route::post('/employe/new', [EmployeController::class, 'store'])->name('storeEmploye');

        //* CLIENTS
        Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    });
});

require __DIR__ . '/auth.php';
