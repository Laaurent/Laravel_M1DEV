<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Nouveau contrat') }}
		</h2>
	</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('storeContract') }}" method="POST">
                        @csrf
                        
                        <div>
                            <label for="cars">Voitures</label>
                            @if (auth()->user()->client()->isPhysic())
                                <select class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="cars[]" id="cars" required>
                                    @foreach ($vehicules as $vehicule)
                                        <option value="{{$vehicule->id}}">{{$vehicule->brand}} - {{$vehicule->model}} </option>
                                    @endforeach
                                </select>
                            @else
                                <select class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" name="cars[]" id="cars" multiple required>
                                    @foreach ($vehicules as $vehicule)
                                        <option value="{{$vehicule->id}}">{{$vehicule->brand}} - {{$vehicule->model}} </option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div>
                            <label for="start">Date début :</label>
                            <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="date" id="start" name="contract_start" :value="old('contract_start')" required>
                        </div>
                        <div>
                            <label for="end">Date fin :</label>
                            <input class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="date" id="end" name="contract_end" :value="old('contract_end')" required>
                        </div>
                        <input class="mt-6 p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500" type="submit" value="Louer">
                    </form>
                    
                    

						<div>
							<label for="cars">Voitures</label>
							@if (auth()->user()->client()->isPhysic())
							<select name="cars[]" id="cars" required>
								@foreach ($vehicules as $vehicule)
								<option value="{{$vehicule->id}}">{{$vehicule->brand}} - {{$vehicule->model}} </option>
								@endforeach
							</select>
							@else
							<select name="cars[]" id="cars" multiple required>
								@foreach ($vehicules as $vehicule)
								<option value="{{$vehicule->id}}">{{$vehicule->brand}} - {{$vehicule->model}} </option>
								@endforeach
							</select>
							@endif
						</div>
						<div>
							<label for="start">Date début :</label>
							<input type="date" id="start" name="contract_start" :value="old('contract_start')" required>
						</div>
						<div>
							<label for="end">Date fin :</label>
							<input type="date" id="end" name="contract_end" :value="old('contract_end')" required>
						</div>
						<input type="submit" value="Louer">
					</form>





				</div>
			</div>
		</div>
	</div>
</x-app-layout>