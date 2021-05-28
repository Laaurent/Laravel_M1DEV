<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contrats') }}
        </h2>
    </x-slot>
    <a href="{{route('createContract')}}">Créer un contrat</a>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Véhicules</th>
                                <th>Employe</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $contract)
                                <tr>
                                   <td>{{$contract->id_client}}</td>
                                   <td>
                                        @foreach ($contract->contract_vehicule as $contract2)
                                            {{$contract2->vehicule->brand}} - {{$contract2->vehicule->model}} /
                                        @endforeach
                                   </td>
                                   <td>{{$contract->id_employe}}</td>
                                   <td>{{$contract->contract_start}}</td>
                                   <td>{{$contract->contract_end}}</td>
                                   <td><a href="{{route('showContract',$contract->id)}}">voir</a>
                                        <form action="{{route('destroyContract',$contract->id)}}" method="post">
                                            @csrf
                                            <input type="submit" name="destroy" value="supprimer"/>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>