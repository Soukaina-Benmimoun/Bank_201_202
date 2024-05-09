@extends('layouts.nav')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-4">Effectuer un retrait</h2>
    <form method="POST" action="{{ route('retrait.store') }}">
        @csrf
        <div class="mb-4">
            <label for="montant" class="block text-gray-700 text-sm font-bold mb-2">Montant</label>
            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="montant" name="montant" required>
        </div>
        
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Terminer
            </button>
        </div>
    </form>
</div>
@endsection
