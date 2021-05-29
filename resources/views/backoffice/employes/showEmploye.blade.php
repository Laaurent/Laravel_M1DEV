<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employés') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <ul>
            <li> Prénom : {{$employe->first_name}} </li>
          </ul>
          <br>
          <h1>Historique des contrats</h1>
          <hr>
          <table>
            <thead>
              <tr>
                  <th>N°Client</th>
                  <th>Date début</th>
                  <th>Date fin</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($employe->contract as $contract2)
                <tr>
                  <td>{{$contract2->client->client_number}}</td>
                  <td>{{$contract2->contract_start}}</td>
                  <td>{{$contract2->contract_end}}</td>
                  <td>
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