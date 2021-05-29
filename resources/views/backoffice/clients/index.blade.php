<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Clients Moraux</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>N° Client</th>
                                <th>Nom</th>
                                <th>N° SIRET</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($morals_clients as $client)
                            <tr>
                                <td>{{$client->client->client_number}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->SIRET_number}}</td>
                                <td><a href="{{route('showClient',$client->client->client_number)}}">voir</a><a href="">supprimer</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <h1>Clients Physiques</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>N° CLient</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($physics_clients as $client)
                            <tr>
                                <td>{{$client->client->client_number}}</td>
                                <td>{{$client->first_name}}</td>
                                <td>{{$client->last_name}}</td>
                                <td><a href="{{route('showClient',$client->client->client_number)}}">voir</a><a href="">supprimer</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>