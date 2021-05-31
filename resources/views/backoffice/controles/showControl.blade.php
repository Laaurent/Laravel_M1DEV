<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		@if (isset($state))
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

				<ul>
					<li> Statut : @if ( (isset($state) && $state->active) || (isset($conf) && $conf->active))
							<span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Disponible</span>
						@else
							<span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Archivé</span>
						@endif
                    </li>
					@if (isset($state))
							<li>Commentaire : {{$state->commentaire}}</li>
							<li>Model du véhicule : {{$state->vehicule->model}}</li>	
					@else	
							<li>Commentaire : {{$conf->commentaire}}</li>
							<li>Model du véhicule : {{$conf->vehicule->model}}</li>
					@endif
				</ul>

					@if ( (isset($state) && $state->active) )
						<div class="mb-6 mt-6">
							<a class=" p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" href="{{route('editState',$state->id)}}">éditer</a>
						</div>
					@elseif (isset($conf) && $conf->active)
						<div class="mb-6 mt-6">
							<a class=" p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" href="{{route('editConformity',$conf->id)}}">éditer</a>
						</div>
					@endif

				</div>
			</div>
		</div>
	</div>
</x-app-layout>