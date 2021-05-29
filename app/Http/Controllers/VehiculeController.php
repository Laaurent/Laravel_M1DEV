<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use Carbon\Carbon;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::all();

        return \view(
            'backoffice.vehicules.index',
            [
                'vehicules' => $vehicules,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('backoffice.vehicules.createVehicule');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicule = Vehicule::insert([
            'type' => $request->type,
            'brand' => $request->brand,
            'model' => $request->model,
            'weight' => $request->weight,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('vehicules');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicule = Vehicule::with('contract_vehicule.contract.employe','contract_vehicule.contract.client')->find($id);

        return \view(
            'backoffice.vehicules.showVehicule',
            [
                'vehicule' => $vehicule,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicule = Vehicule::find($id);

        return \view(
            'backoffice.vehicules.editVehicule',
            [
                'vehicule' => $vehicule,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        Vehicule::where('id', $id)
            ->update([
                'type' => $request->type,
                'brand' => $request->brand,
                'model' => $request->model,
                'weight' => $request->weight,
                'updated_at' => Carbon::now(),
            ]);

        return redirect()->route('vehicules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicule = Vehicule::where('id', $id)->delete();

        return redirect()->route('vehicules');
    }
}
