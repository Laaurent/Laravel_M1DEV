<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Editer véhicule') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('storeVehicule') }}" method="POST">
            @csrf
            <div>
              <label for="brand">Marque :</label>
              <select name="brand" id="brand" value="{{$vehicule->brand}}" required>
                <option value="Audi">Audi </option>
                <option value="Peugeot">Peugeot </option>
                <option value="Renault">Renault </option>
                <option value="Opel">Opel </option>
                <option value="Citroen">Citroën </option>
                <option value="BMW">BMW </option>
                <option value="Mercedes">Mercedes </option>
                <option value="Toyota">Toyota </option>
                <option value="Ford">Ford </option>
              </select>
            </div>
            <div>
              <label for="model">Modèle :</label>
              <input type="text" id="model" name="model" value="{{$vehicule->model}}" required>
            </div>

            <div>
              <label for="weight">Poids :</label>
              <input type="number" id="number" name="weight" value="{{$vehicule->weight}}" required>
            </div>
            <input type="submit" value="Editer">
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>