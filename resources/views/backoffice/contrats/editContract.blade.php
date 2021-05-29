<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Editer contrat') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('updateContract',$contract->id) }}" method="POST">
            @csrf
            <div>
              Client : n°{{$contract->id_client}}
            </div>
            <div>
              <label for="employe">Employé :</label>
              <select name="employe" id="employe" value="{{$contract->id_employe}}" required>
                @foreach ($employes as $employe)
                  <option value="{{$employe->id}}">{{$employe->first_name}} - {{$employe->last_name}}</option>
                @endforeach
              </select>
            </div>
            <div>
              <label for="contract_start">Date début :</label>
              <input type="date" id="contract_start" name="contract_start" value="{{$contract->contract_start}}" required>
            </div>

            <div>
              <label for="contract_end">Date fin :</label>
              <input type="date" id="contract_end" name="contract_end" value="{{$contract->contract_end}}" required>
            </div>
            <div>
              <label for="vehicule">Véhicules :</label>
              <p> Actuels :
                @foreach ($contract->contract_vehicule as $contract)
                  {{$contract->vehicule->type}} - {{$contract->vehicule->brand}} - {{$contract->vehicule->model}} /
                @endforeach
              </p>
              <select name="vehicule[]" id="vehicule" required multiple>
                @foreach ($vehicules as $vehicule)
                  <option value="{{$vehicule->id}}">{{$vehicule->brand}} - {{$vehicule->model}}</option>
                @endforeach
              </select>
            </div>
            <input type="submit" value="Editer">
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>