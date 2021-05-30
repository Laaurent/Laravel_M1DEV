<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Editer Employe') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('updateEmploye',$employe->id) }}" method="POST">
            @csrf

            <div>
              <label for="name">Pseudo :</label>
              <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" id="name" name="name" value="{{$employe->user->name}}" required>
            </div>

            <div>
              <label for="first_name">Prénom :</label>
              <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" id="first_name" name="first_name" value="{{$employe->first_name}}" required>
            </div>

            <div>
              <label for="last_name">Nom :</label>
              <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" id="last_name" name="last_name" value="{{$employe->last_name}}" required>
            </div>

            <div>
              <label for="email">Email :</label>
              <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="email" id="email" name="email" value="{{$employe->user->email}}" required>
            </div>
    
            <input class="mt-6 p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" type="submit" value="Editer">
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>