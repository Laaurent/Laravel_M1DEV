<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Ajouter un véhicule') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('storeContract') }}" method="POST">
            @csrf

            <div>
              <label for="brand">Marque :</label>
              <select name="brand" id="brand" required>
                <option value="audi">Audi </option>
                <option value="peugeot">Peugeot </option>
                <option value="renault">Renault </option>
                <option value="opel">Opel </option>
                <option value="citroen">Citroën </option>
                <option value="bmw">BMW </option>
                <option value="mercedes">Mercedes </option>
                <option value="toyota">Toyota </option>
                <option value="ford">Ford </option>
              </select>
            </div>
            <div>
              <label for="model">Modèle :</label>
              <input type="text" id="model" name="model" required>
            </div>

            <div>
              <label for="weight">Poids :</label>
              <input type="number" id="number" name="weight" required>
            </div>
            <input type="submit" value="Ajouter">
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>