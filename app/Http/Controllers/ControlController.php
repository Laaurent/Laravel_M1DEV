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
		$Scontrols = StateControl::with('employe')->get();
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
		return \view(
			'backoffice.controles.createConformity',
			[
				'id_vehicule' => $id,
			]
		);
	}
	public function createState($id)
	{
		$employes = Employe::all();
		return \view(
			'backoffice.controles.createState',
			[
				'employes' => $employes,
				'id_vehicule' => $id,
			]
		);
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

		return redirect()->route('showVehicule', $id);
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

		return redirect()->route('showVehicule', $id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showState($id)
	{
		$controle = StateControl::with('vehicule')->find($id);

		return \view(
			'backoffice.controles.showState',
			[
				'state' => $controle,
			]
			);
	}
	public function showConf($id)
	{
		$controle = ConformityControl::with('vehicule')->find($id);

		return \view(
			'backoffice.controles.showConformity',
			[
				'conf' => $controle,
			]
			);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function editState($id)
	{
		$controle = StateControl::find($id);

		return \view(
			'backoffice.controles.editState',
			[
				'state' => $controle,
			]
		);
	}
	public function editConf($id)
	{
		$controle = ConformityControl::find($id);

		return \view(
			'backoffice.controles.editConformity',
			[
				'conf' => $controle,
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
	public function updateState(Request $request, $id)
	{
		$controle = StateControl::find($id);
		$controle->update([
			'commentaire' => $request->commentaire,
			'date' => $request->date
		]);
		return \view(
			'backoffice.controles.showState',
			[
				'state' => $controle,
			]
		);
	}
	public function updateConf(Request $request, $id)
	{
		$controle = ConformityControl::find($id);
		$controle->update([
			'commentaire' => $request->commentaire,
			'date' => $request->date
		]);
		return \view(
			'backoffice.controles.showConformity',
			[
				'conf' => $controle,
			]
		);
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

	/**
	 * Desacrive the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function desactive($id)
	{
		//
	}
}
