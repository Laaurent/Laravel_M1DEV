<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    @if (isset($state))
      {{ __('Editer état') }}
    @else
      {{ __('Editer état de conformité')}}
    @endif
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
        @if (isset($state))
          <form action="{{ route('updateState',$state->id) }}" method="POST">
            @csrf
            <div>
              <label for="commentaire">Commentaire :</label>
              <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" id="commentaire" name="commentaire" value="{{$state->commentaire}}" required>
            </div>

            <div>
              <label for="date">Date :</label>
              <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="date" id="date" name="date" value="{{$state->date}}" required>
            </div>
    
            <input class="mt-6 p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" type="submit" value="Editer">
          </form>
        @else
        <form action="{{ route('updateConformity',$conf->id) }}" method="POST">
            @csrf
            <div>
              <label for="commentaire">Commentaire :</label>
              <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="text" id="commentaire" name="commentaire" value="{{$conf->commentaire}}" required>
            </div>

            <div>
              <label for="date">Date :</label>
              <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="date" id="date" name="date" value="{{$conf->date}}" required>
            </div>
    
            <input class="mt-6 p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" type="submit" value="Editer">
          </form>
        @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>