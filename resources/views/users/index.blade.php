@extends('layouts.nav')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-4">Liste des Utilisateurs</h2>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Nom</th>
                <th class="px-4 py-2">Prenom</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Solde</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->nom }}</td>
                <td class="border px-4 py-2">{{ $user->prenom }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">{{ $user->solde }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">Modifier</a>
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
