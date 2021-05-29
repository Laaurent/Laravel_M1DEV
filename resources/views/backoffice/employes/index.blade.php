<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employés') }}
        </h2>
    </x-slot>
    <a href="{{route('createEmploye')}}">Ajouter un Employé</a>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <table>
                        <thead>
                            <tr>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employes as $employe)
                              <tr>
                                <td>{{$employe->first_name}}</td>
                                <td>{{$employe->last_name}}</td>
                                <td><a href="{{route('showEmploye',$employe->id)}}">voir</a><a href="">supprimer</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>