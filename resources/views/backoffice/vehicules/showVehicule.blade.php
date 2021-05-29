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
        </div>
      </div>
    </div>
  </div>
</x-app-layout>