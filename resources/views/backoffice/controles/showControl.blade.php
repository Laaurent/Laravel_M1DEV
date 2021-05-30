<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		@if ($state)
			{{ __('Voir controle d\'état') }}
		@else 
			{{ __('Voir controle d\'état de conformité')}}
		@endif
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
				@if ($state)
					<ul>
						<li>Commentaire : {{$state->commentaire}}</li>
						<li>Model du véhicule : {{$state->vehicule->model}}</li>
					</ul>
				@else
					<ul>
						<li>Commentaire : {{$conf->commentaire}}</li>
						<li>Model du véhicule : {{$conf->vehicule->model}}</li>
					</ul>
				@endif
				</div>
			</div>
		</div>
	</div>
</x-app-layout>