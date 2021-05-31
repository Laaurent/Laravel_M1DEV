@section('title')
{{"Voir le contrat"}}
@endsection
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
						<li> Statut : @if ($contract->active)
										<span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Disponible</span>
									@else
										<span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Archivé</span>
									@endif
                        </li>
						<li>Client : n°{{$contract->client->client_number}}</li>
						<li>Employe : {{$contract->employe->first_name}} {{$contract->employe->last_name}}</li>
						<li>Date début : {{$contract->contract_start}}</li>
						<li>Client : {{$contract->contract_end}}</li>
						<li>Véhicule :
							@foreach ($contract->contract_vehicule as $contract2)
							{{$contract2->vehicule->brand}} {{$contract2->vehicule->model}}
							@if (!$loop->last)
							/
							@endif
							@endforeach
						</li>
					</ul>

					@if ($contract->active)
                    <div class="mb-6 mt-6">
                        <a class=" p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" href="{{route('editContract',$contract->id)}}">éditer</a>
                    </div>
                    @endif
				</div>
			</div>
		</div>
	</div>
</x-app-layout>