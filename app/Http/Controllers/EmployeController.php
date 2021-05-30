<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class EmployeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$employes = Employe::all();

		return \view(
			'backoffice.employes.index',
			[
				'employes' => $employes,
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
		return \view('backoffice.employes.createEmploye');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$user = User::create([
			'name' => $request->pseudo,
			'email' => $request->email,
			'user_type' => 'employe',
			'password' => Hash::make($request->password),
		]);

		$employe = Employe::create([
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'id_user' => $user->id,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
		]);

		return redirect()->route('employes');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$employe = Employe::with('contract.client')->find($id);

		return \view(
			'backoffice.employes.showEmploye',
			[
				'employe' => $employe,
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
		$employe = Employe::find($id)

		
		return \view(
			'backoffice.employes.editEmploye',
			[
				'employe' => $employe,
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
