<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Véhicules') }}
        </h2>
    </x-slot>
    <a href="{{route('createVehicule')}}">Ajouter une voiture</a>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                            <tr>
                                <th>Marque</th>
                                <th>Modele</th>
                                <th>Poids</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicules as $vehicule)
                            <tr>
                                <td>{{$vehicule->brand}}</td>
                                <td>{{$vehicule->model}}</td>
                                <td>{{$vehicule->weight}}</td>
                                <td>
                                    <a href="{{route('showVehicule',$vehicule->id)}}">voir</a>
                                    <a href="{{route('editVehicule',$vehicule->id)}}">éditer</a>
                                    <form action="{{route('destroyVehicule',$vehicule->id)}}" method="post">
                                        @csrf
                                        <input type="submit" name="destroy" value="supprimer" />
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