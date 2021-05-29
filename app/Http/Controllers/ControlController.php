<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConformityControl;
use App\Models\StateControl;
use App\Models\Employe;
use Carbon\Carbon;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $Scontrols = StateControl::all();
       $Ccontrols = ConformityControl::all();

        return \view(
            'backoffice.controles.index',
            [
                'states_controls' => $Scontrols,
                'conformities_controls' => $Ccontrols,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createConf($id)
    {
        return \view('backoffice.controles.createConformity',
        [
            'id_vehicule' => $id,
        ]);
    }
    public function createState($id)
    {
        $employes = Employe::all();
        return \view('backoffice.controles.createState',
        [
            'employes' => $employes,
            'id_vehicule' => $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeConf(Request $request, $id)
    {
        $control = ConformityControl::insert([
            'id_vehicule' => $id,
            'date' => $request->date,
            'commentaire' => $request->commentaire,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('showVehicule',$id);
    }
    public function storeState(Request $request, $id)
    {
        $control = StateControl::insert([
            'id_employe' => $request->employe,
            'id_vehicule' => $id,
            'date' => $request->date,
            'commentaire' => $request->commentaire,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('showVehicule',$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
