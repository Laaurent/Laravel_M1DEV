<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Ajouter un employé') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('storeEmploye') }}" method="POST">
            @csrf

            <div>
              <label for="first_name">Prénom :</label>
              <input type="text" id="first_name" name="first_name" required>
             
            </div>
            <div>
            <label for="last_name">Nom :</label>
              <input type="text" id="last_name" name="last_name" required>
            </div>
            <div>
            <label for="pseudo">Pseudo :</label>
              <input type="text" id="pseudo" name="pseudo" required>
            </div>
            <div>
            <label for="email">Email :</label>
              <input type="email" id="email" name="email" required>
            </div>
            <div>
            <label for="password">Mot de passe :</label>
              <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Ajouter">
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>