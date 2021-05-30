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
								<td class="py-3 px-6 text-center">               
									<div class="flex item-center justify-center">
									<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
										<a href="{{route('showState',$state_control->id)}}">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
										</svg>
										</a>
									</div>
									<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
										<a href="{{route('editState',$state_control->id)}}">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
										</svg>
										</a>
									</div>
									<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
										<form action="{{route('desactiveState',$state_control->id)}}" method="post">
										@csrf
										<button type="submit" name="destroy" class="w-4 h-4">
											<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path d="M24,1H0V7H1V24H23V7h1ZM2,3H22V5H2ZM21,22H3V7H21Z" />
											<rect x="8.5" y="9" width="7" height="2" />
											</svg>
										</button>
										</form>
									</div>
									<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
										<form action="{{route('destroyState',$state_control->id)}}" method="post">
										@csrf
										<button type="submit" name="destroy" class="w-4 h-4">

											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
											</svg>

										</button>
										</form>
									</div>
									</div>
								</td>
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
								<td class="py-3 px-6 text-center">               
									<div class="flex item-center justify-center">
									<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
										<a href="{{route('showConformity',$conformity_control->id)}}">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
										</svg>
										</a>
									</div>
									<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
										<a href="{{route('editConformity',$conformity_control->id)}}">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
										</svg>
										</a>
									</div>
									<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
										<form action="{{route('desactiveConformity',$conformity_control->id)}}" method="post">
										@csrf
										<button type="submit" name="destroy" class="w-4 h-4">
											<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path d="M24,1H0V7H1V24H23V7h1ZM2,3H22V5H2ZM21,22H3V7H21Z" />
											<rect x="8.5" y="9" width="7" height="2" />
											</svg>
										</button>
										</form>
									</div>
									<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
										<form action="{{route('destroyConformity',$conformity_control->id)}}" method="post">
										@csrf
										<button type="submit" name="destroy" class="w-4 h-4">

											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
											</svg>

										</button>
										</form>
									</div>
									</div>
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