@section('title')
{{"Infos de "}} {{$vehicule->brand}} {{$vehicule->model}}
@endsection
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Voir véhicule') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <ul>
            <li> Type : {{$vehicule->type}} </li>
            <li> Marque : {{$vehicule->brand}} </li>
            <li> Modèle : {{$vehicule->model}} </li>
            <li> Poids : {{$vehicule->weight}} </li>
            @if (!Auth::user()->isClient())
            <div class="mb-6 mt-6">
              <a class=" p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" href="{{route('editVehicule',$vehicule->id)}}">éditer</a>
            </div>
            @endif
          </ul>
          <br>
          @if (!Auth::user()->isClient())
          <h1 class="text-xl font-bold">Historique des contrats</h1>
          <hr>
          <table class=" w-full table-auto">
            <thead>
              <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">N°Client</th>
                <th class="py-3 px-6 text-left">Employé</th>
                <th class="py-3 px-6 text-left">Date début</th>
                <th class="py-3 px-6 text-left">Date fin</th>
                <th class="py-3 px-6 text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($vehicule->contract_vehicule as $contract2)
              <tr>
                <td class="py-3 px-6 text-left">{{$contract2->contract->client->client_number}}</td>
                <td class="py-3 px-6 text-left">{{$contract2->contract->employe->first_name}} {{$contract2->contract->employe->last_name}}</td>
                <td class="py-3 px-6 text-left">{{$contract2->contract->contract_start}}</td>
                <td class="py-3 px-6 text-left">{{$contract2->contract->contract_end}}</td>
                <td class="py-3 px-6 text-center">
                  <div class="flex item-center justify-center">
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                      <a href="{{route('showContract',$contract2->contract->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </a>
                    </div>
                    @if (!Auth::user()->isClient())
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                      <a href="{{route('editContract',$contract2->contract->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                      </a>
                    </div>
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
											<form action="{{route('desactiveContract',$contract2->contract->id)}}" method="post">
												@csrf
												<button type="submit" name="destroy" class="w-4 h-4">
													<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
														<path d="M24,1H0V7H1V24H23V7h1ZM2,3H22V5H2ZM21,22H3V7H21Z" />
														<rect x="8.5" y="9" width="7" height="2" />
													</svg>
												</button>
											</form>
										</div>
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                      <form action="{{route('destroyContract',$contract2->contract->id)}}" method="post">
                        @csrf
                        <button type="submit" name="destroy" class="w-4 h-4">

                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>

                        </button>
                      </form>
                    </div>
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <br>
          <h1 class="text-xl font-bold">Historique des controle d'états</h1>
          <div class="mb-6 mt-6">
            <a class=" p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" href="{{route('createState',$vehicule->id)}}">Ajouter un contrôle d'état</a>
          </div>
          <hr>
          <table class=" w-full table-auto">
            <thead>
              <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                  <th class="py-3 px-6 text-left">commentaire</th>
                  <th class="py-3 px-6 text-left">Controle fait par</th>
                  <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($vehicule->states_controls as $state)
                <tr>
                  <td class="py-3 px-6 text-left">{{$state->commentaire}}</td>
                  <td class="py-3 px-6 text-left">{{$state->employe->first_name}} {{$state->employe->last_name}}</td>
                  <td class="py-3 px-6 text-center">               
                    <div class="flex item-center justify-center">
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <a href="{{route('showState',$state->id)}}">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                          </svg>
                        </a>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <a href="{{route('editState',$state->id)}}">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                        </a>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <form action="{{route('desactiveState',$state->id)}}" method="post">
                          @csrf
                          <button type="submit" name="destroy" class="w-4 h-4">
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M24,1H0V7H1V24H23V7h1ZM2,3H22V5H2ZM21,22H3V7H21Z" />
                              <rect x="8.5" y="9" width="7" height="2" />
                            </svg>
                          </button>
                        </form>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <form action="{{route('destroyState',$state->id)}}" method="post">
                          @csrf
                          <button type="submit" name="destroy" class="w-4 h-4">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>

                          </button>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <br>
          @endif
          <h1 class="text-xl font-bold">Historique des controle de conformités</h1>
          @if (!Auth::user()->isClient())
          <div class="mb-6 mt-6">
            <a class=" p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" href="{{route('createConformity',$vehicule->id)}}">Ajouter un contrôle de conformité</a>
          </div>
          @endif
          <hr>
          <table class=" w-full table-auto">
            <thead>
              <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">commentaire</th>
                <th class="py-3 px-6 text-left">date</th>
                <th class="py-3 px-6 text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($vehicule->conformity_control as $conf)
                <tr>
                  <td class="py-3 px-6 text-left">{{$conf->commentaire}}</td>
                  <td class="py-3 px-6 text-left">{{$conf->date}}</td>
                  <td class="py-3 px-6 text-center">               
                    <div class="flex item-center justify-center">
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <a href="{{route('showConformity',$conf->id)}}">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                          </svg>
                        </a>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <a href="{{route('editConformity',$conf->id)}}">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                          </svg>
                        </a>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <form action="{{route('desactiveConformity',$conf->id)}}" method="post">
                          @csrf
                          <button type="submit" name="destroy" class="w-4 h-4">
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path d="M24,1H0V7H1V24H23V7h1ZM2,3H22V5H2ZM21,22H3V7H21Z" />
                              <rect x="8.5" y="9" width="7" height="2" />
                            </svg>
                          </button>
                        </form>
                      </div>
                      <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                        <form action="{{route('destroyConformity',$conf->id)}}" method="post">
                          @csrf
                          <button type="submit" name="destroy" class="w-4 h-4">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>

                          </button>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>