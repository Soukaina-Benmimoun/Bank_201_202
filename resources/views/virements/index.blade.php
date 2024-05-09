@extends('layouts.nav')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-4">Liste des virements</h2>
    
    <table class="min-w-full divide-y divide-gray-200 mt-4">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Beneficiaire</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Motif</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($virements as $virement)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $virement->beneficiaire->nom}} {{ $virement->beneficiaire->prenom}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $virement->montant }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $virement->motif }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $virement->created_at->format('d/m/Y') }}</td>
                
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('virements.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="" role="button">
        Créer un nouveau virement
    </a>
</div>
@endsection
