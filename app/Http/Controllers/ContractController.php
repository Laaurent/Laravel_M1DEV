<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Vehicule;
use App\Models\Employe;
use App\Models\ContractVehicule;
use Auth;
use Carbon\Carbon;

class ContractController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$contracts = Contract::with(['contract_vehicule.vehicule'])->get();

		return \view(
			'backoffice.contrats.index',
			[
				'contracts' => $contracts,
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
		$vehicules = Vehicule::all();

		return \view(
			'backoffice.contrats.createContract',
			[
				'vehicules' => $vehicules,
			]
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$count = Employe::count();

		$contract = Contract::insertGetId([
			'id_client' => Auth::id(),
			'id_employe' => rand(1, $count),
			'contract_start' => $request->contract_start,
			'contract_end' =>   $request->contract_end,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
		]);

		foreach ($request->cars as $car) {
			$contract_vehicule = ContractVehicule::insert([
				'id_contract' => $contract,
				'id_vehicule' => $car,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			]);
		}

		return redirect()->route('contracts');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$contract = Contract::with(['contract_vehicule.vehicule', 'employe', 'client'])->find($id);

		return \view(
			'backoffice.contrats.showContract',
			[
				'contract' => $contract,
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
		$contract = Contract::with(['contract_vehicule.vehicule'])->find($id);

		$vehicules = Vehicule::all();

		$employes = Employe::all();

		return \view(
			'backoffice.contrats.editContract',
			[
				'contract' => $contract,
				'vehicules' => $vehicules,
				'employes' => $employes,
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
		Contract::where('id', $id)
			->update([
				'id_employe' => $request->employe,
				'contract_start' => $request->contract_start,
				'contract_end' => $request->contract_end,
				'updated_at' => Carbon::now(),
			]);

		ContractVehicule::where('id_contract', $id)->delete();

		foreach ($request->vehicule as $key => $value) {
			ContractVehicule::insert([
				'id_contract' => $id,
				'id_vehicule' => $value,
				'updated_at' => Carbon::now(),
			]);
		}

		return redirect()->route('contracts');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$contract = Contract::where('id', $id)->delete();

		return redirect()->route('contracts');
	}
}
