@section('title')
{{"Infos du client"}} {{$client->user->name}}
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voir client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        <li> Statut : @if ($client->active)
                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Disponible</span>
                            @else
                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Archivé</span>
                            @endif
                        </li>
                        <li>Pseudo : {{$client->user->name}} </li>
                        <li>Email : {{$client->user->email}}</li>
                        <li>N° Client : {{$client->client_number}}</li>
                        @if ($client->isPhysic())
                        <li>Prénom : {{$client->physicClient->first_name}}</li>
                        <li>Nom : {{$client->physicClient->last_name}}</li>
                        @else
                        <li>Nom : {{$client->moralClient->name}}</li>
                        <li>N° SIRET : {{$client->moralClient->SIRET_number}}</li>
                        @endif
                    </ul>

                    @if ($client->active)
                        <div class="mb-6 mt-6">
                            <a class=" p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" href="{{route('editClient',$client->id_user)}}">éditer</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>