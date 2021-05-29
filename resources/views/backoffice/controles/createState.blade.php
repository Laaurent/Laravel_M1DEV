<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Ajouter un controle d\'état') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('storeState',$id_vehicule) }}" method="POST">
            @csrf
            <div>
              <label for="commentaire">Commentaire :</label>
              <input type="text" id="commentaire" name="commentaire" required>
            </div>
            <div>
              <label for="date">Date :</label>
              <input type="date" id="date" name="date" required>
            </div>
            <div>
              <label for="employe">Controle fait par :</label>
              <select name="employe" id="employe" required>
              @foreach($employes as $employe)
                <option value="{{$employe->id}}">{{$employe->first_name}} {{$employe->last_name}} </option>
              @endforeach
              </select>
            </div>
            <input type="submit" value="Ajouter">
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>