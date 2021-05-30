<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Voir contrat') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<ul>
						<li>Client : n°{{$contract->client->client_number}}</li>
						<li>Employe : {{$contract->employe->first_name}} {{$contract->employe->last_name}}</li>
						<li>Date début : {{$contract->contract_start}}</li>
						<li>Client : {{$contract->contract_end}}</li>
						<li>Vehicule :
							@foreach ($contract->contract_vehicule as $contract2)
							{{$contract2->vehicule->brand}} - {{$contract2->vehicule->model}} /
							@endforeach
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>