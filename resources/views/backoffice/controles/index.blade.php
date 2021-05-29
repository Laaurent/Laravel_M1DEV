<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Controles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Historique des controle d'états</h1>
                    <hr>
                    <table>
                        <thead>
                        <tr>
                            <th>commentaire</th>
                            <th>Controle fait par</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($states_controls as $state_control)
                            <tr>
                            <td>{{$state_control->commentaire}}</td>
                            <td>{{$state_control->employe->first_name}} {{$state_control->employe->last_name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <h1>Historique des controle de conformités</h1>
                    <hr>
                    <table>
                        <thead>
                        <tr>
                            <th>commentaire</th>
                            <th>date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($conformities_controls as $conformity_control)
                            <tr>
                            <td>{{$conformity_control->commentaire}}</td>
                            <td>{{$conformity_control->date}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>