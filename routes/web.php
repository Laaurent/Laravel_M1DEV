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
	if (Auth::check()) {
		return redirect()->route('dashboard');
	}
	return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $contracts = Contract::where('id_client',Auth::id())->where('active',1)->get();

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
    Route::post('/client/password/{id}', [ClientController::class, 'password'])->middleware(['client'])->name('passwordClient');

    Route::middleware(['employe'])->group(function () {
        //* CONTRATS
        Route::get('/contracts', [ContractController::class, 'index'])->name('contracts');
        Route::get('/contract/edit/{id}', [ContractController::class, 'edit'])->name('editContract');
        Route::post('/contract/edit/{id}', [ContractController::class, 'update'])->name('updateContract');
        Route::post('/contract/delete/{id}', [ContractController::class, 'destroy'])->name('destroyContract');
        Route::post('/contract/desactive/{id}', [ContractController::class, 'desactive'])->name('desactiveContract');

        //* VEHICULES
        Route::get('/vehicule/new', [VehiculeController::class, 'create'])->name('createVehicule');
        Route::post('/vehicule/new', [VehiculeController::class, 'store'])->name('storeVehicule');
        Route::get('/vehicule/edit/{id}', [VehiculeController::class, 'edit'])->name('editVehicule');
        Route::post('/vehicule/edit/{id}', [VehiculeController::class, 'update'])->name('updateVehicule');
        Route::post('/vehicule/delete/{id}', [VehiculeController::class, 'destroy'])->name('destroyVehicule');
        Route::post('/vehicule/desactive/{id}', [VehiculeController::class, 'desactive'])->name('desactiveVehicule');

        //* CONTROLES
        Route::get('/controls', [ControlController::class, 'index'])->name('controls');
        Route::get('/control/conformite/vehicule/{id}/new', [ControlController::class, 'createConf'])->name('createConformity');
        Route::post('/control/conformite/vehicule/{id}/new', [ControlController::class, 'storeConf'])->name('storeConformity');
        Route::get('/control/etat/vehicule/{id}/new', [ControlController::class, 'createState'])->name('createState');
        Route::post('/control/etat/vehicule/{id}/new', [ControlController::class, 'storeState'])->name('storeState');
        Route::get('/control/etat/vehicule/edit/{id}', [ControlController::class, 'editState'])->name('editState');
        Route::post('/control/etat/vehicule/edit/{id}', [ControlController::class, 'updateState'])->name('updateState');
        Route::get('/control/conformite/vehicule/edit/{id}', [ControlController::class, 'editConf'])->name('editConformity');
        Route::post('/control/conformite/vehicule/edit/{id}', [ControlController::class, 'updateConf'])->name('updateConformity');
        Route::get('/control/etat/vehicule/show/{id}', [ControlController::class, 'showState'])->name('showState');
        Route::get('/control/conformite/vehicule/show/{id}', [ControlController::class, 'showConf'])->name('showConformity');
        Route::post('/control/etat/vehicule/desactive/{id}', [ControlController::class, 'desactiveState'])->name('desactiveState');
        Route::post('/control/conformite/vehicule/desactive/{id}', [ControlController::class, 'desactiveConf'])->name('desactiveConformity');
        Route::post('/control/etat/vehicule/destroy/{id}', [ControlController::class, 'destroyState'])->name('destroyState');
        Route::post('/control/conformite/vehicule/destroy/{id}', [ControlController::class, 'destroyConf'])->name('destroyConformity');

        //* EMPLOYES
        Route::get('/employes', [EmployeController::class, 'index'])->name('employes');
        Route::get('/employe/show/{id}', [EmployeController::class, 'show'])->name('showEmploye');
        Route::get('/employe/new', [EmployeController::class, 'create'])->name('createEmploye');
        Route::post('/employe/new', [EmployeController::class, 'store'])->name('storeEmploye');
        Route::get('/employe/edit/{id}', [EmployeController::class, 'edit'])->name('editEmploye');
        Route::post('/employe/edit/{id}', [EmployeController::class, 'update'])->name('updateEmploye');
        Route::post('/employe/destroy/{id}', [EmployeController::class, 'destroy'])->name('destroyEmploye');
        Route::post('/employe/desactive/{id}', [EmployeController::class, 'desactive'])->name('desactiveEmploye');
        Route::post('/employe/password/{id}', [EmployeController::class, 'password'])->name('passwordEmploye');

        //* CLIENTS
        Route::get('/clients', [ClientController::class, 'index'])->name('clients');
        Route::post('/client/destroy/{id}', [ClientController::class, 'destroy'])->name('destroyClient');
        Route::post('/client/desactive/{id}', [ClientController::class, 'desactive'])->name('desactiveClient');
    });
});

require __DIR__ . '/auth.php';
