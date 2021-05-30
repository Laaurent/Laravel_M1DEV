<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Tableau de bord') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<h1 class="text-xl font-bold">Bonjour, {{auth()->user()->getAuthName()}} !</h1>
					@if (Auth::user()->isClient())
					<div class=" mt-6 mb-6">
						<a class=" p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" href="{{route('createContract')}}">Nouveau contrat</a>
					</div>
					<h1 class="text-xl font-bold">Mes Contrats</h1>
					<hr>
					<table class=" w-full table-auto">
						<thead>
							<tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
								<th class="py-3 px-6 text-left">Véhicules</th>
								<th class="py-3 px-6 text-left">Employe</th>
								<th class="py-3 px-6 text-left">Date début</th>
								<th class="py-3 px-6 text-left">Date fin</th>
								<th class="py-3 px-6 text-center">Action</th>
							</tr>
						</thead>
						<tbody class="text-gray-600 text-sm font-light">
							@foreach ($contracts as $contract)
							<tr class="border-b border-gray-200 hover:bg-gray-100">
								<td class="py-3 px-6 text-left">
									@foreach ($contract->contract_vehicule as $contract2)
									{{$contract2->vehicule->brand}} - {{$contract2->vehicule->model}} /
									@endforeach
								</td>
								<td class="py-3 px-6 text-left">{{$contract->employe->first_name}} {{$contract->employe->last_name}}</td>
								<td class="py-3 px-6 text-left">{{$contract->contract_start}}</td>
								<td class="py-3 px-6 text-left">{{$contract->contract_end}}</td>
								<td class="py-3 px-6 text-center">
									<div class="flex item-center justify-center">
										<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
											<a href="{{route('showContract',$contract->id)}}">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
												</svg>
											</a>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif
				</div>
			</div>
		</div>
	</div>
</x-app-layout>