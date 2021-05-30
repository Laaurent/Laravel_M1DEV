<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\MoralClient;
use App\Models\PhysicClient;
use Carbon\Carbon;
use Auth;

class ClientController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$Mclients = MoralClient::with(['client'])->get();
		$Pclients = PhysicClient::with(['client'])->get();

		return \view(
			'backoffice.clients.index',
			[
				'morals_clients' => $Mclients,
				'physics_clients' => $Pclients,
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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::where('id_user', $id)->with(['physicClient','moralClient','user'])->first();

		return \view(
			'backoffice.clients.showClient',
			[
				'client' => $client,
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
        $client = Client::where('id_user', $id)->with(['physicClient','moralClient','user'])->first();

		return \view(
			'backoffice.clients.editClient',
			[
				'client' => $client,
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
       
        $user = User::find($id);   
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ]);
        
        if($user->client()->isPhysic())
        {
            $Pclient = PhysicClient::where('id_client', $id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            $Mclient = MoralClient::where('id_client', $id)->update([
                'name' => $request->name,
                'SIRET_number' => $request->SIRET_number,
                'updated_at' => Carbon::now(),
            ]);
        }
        
        if(Auth::user()->isClient())
            return redirect()->route('showClient',Auth::id());
        else
            return redirect()->route('clients');
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
