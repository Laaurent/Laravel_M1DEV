@section('title')
{{"Contrôles"}}
@endsection
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
					<h1 class="text-xl font-bold">Historique des controle d'états</h1>
					<hr>
					<table class=" w-full table-auto">
						<thead>
							<tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
								<th class="py-3 px-6 text-left">commentaire</th>
								<th class="py-3 px-6 text-left">Controle fait par</th>
								<th class="py-3 px-6 text-center">Action</th>
							</tr>
						</thead>
						<tbody class="text-gray-600 text-sm font-light">
							@foreach($states_controls as $state_control)
							<tr class="border-b border-gray-200 hover:bg-gray-100">
								<td class="py-3 px-6 text-left">{{$state_control->commentaire}}</td>
								<td class="py-3 px-6 text-left">{{$state_control->employe->first_name}} {{$state_control->employe->last_name}}</td>
								<td class="py-3 px-6 text-center">actions</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					<h1 class="text-xl font-bold">Historique des controle de conformités</h1>
					<hr>
					<table class=" w-full table-auto">
						<thead>
							<tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
								<th class="py-3 px-6 text-left">commentaire</th>
								<th class="py-3 px-6 text-left">date</th>
								<th class="py-3 px-6 text-center">Action</th>
							</tr>
						</thead>
						<tbody class="text-gray-600 text-sm font-light">
							@foreach($conformities_controls as $conformity_control)
							<tr class="border-b border-gray-200 hover:bg-gray-100">
								<td class="py-3 px-6 text-left">{{$conformity_control->commentaire}}</td>
								<td class="py-3 px-6 text-left">{{$conformity_control->date}}</td>
								<td class="py-3 px-6 text-center">actions</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>