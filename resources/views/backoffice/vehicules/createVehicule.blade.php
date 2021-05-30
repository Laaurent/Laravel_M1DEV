@section('title')
{{"Ajouter un véhicule"}}
@endsection
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
          <form action="{{ route('storeVehicule') }}" method="POST">
            @csrf
            <div>
              <label for="type">Type :</label>
              <select class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="type" id="type" required>
                <option value="leger">Leger </option>
                <option value="utilitaire">Utilitaire </option>
              </select>
            </div>
            <div>
              <label for="brand">Marque :</label>
              <select class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="brand" id="brand" required>
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
              <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" id="model" name="model" required>
            </div>

            <div>
              <label for="weight">Poids :</label>
              <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="number" id="number" name="weight" required>
            </div>
            <input class="mt-6 p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" type="submit" value="Ajouter">
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>