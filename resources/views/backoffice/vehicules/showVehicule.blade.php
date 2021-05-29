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
            <li> Marque : {{$vehicule->brand}} </li>
            <li> Modèle : {{$vehicule->model}} </li>
            <li> Poids : {{$vehicule->weight}} </li>
            <li> <a href="{{route('editVehicule',$vehicule->id)}}">éditer</a> </li>
          </ul>
          <br>
          <h1>Historique des contrats</h1>
          <hr>
          <table>
            <thead>
              <tr>
                  <th>N°Client</th>
                  <th>Employé</th>
                  <th>Date début</th>
                  <th>Date fin</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($vehicule->contract_vehicule as $contract2)
                <tr>
                  <td>{{$contract2->contract->client->client_number}}</td>
                  <td>{{$contract2->contract->employe->first_name}} {{$contract2->contract->employe->last_name}}</td>
                  <td>{{$contract2->contract->contract_start}}</td>
                  <td>{{$contract2->contract->contract_end}}</td>
                  <td><a href="{{route('showContract',$contract2->contract->id)}}">voir</a>
                      <form action="{{route('destroyContract',$contract2->contract->id)}}" method="post">
                          @csrf
                          <input type="submit" name="destroy" value="supprimer"/>
                      </form>
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