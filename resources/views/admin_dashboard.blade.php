@extends('layouts.nav')

@section('content')
<nav class="flex items-center justify-between p-6 bg-blue-500">
    <div class="flex items-center">
        <div class="text-white text-lg font-semibold">
            Bank
        </div>
    </div>
    <div class="relative inline-block text-left">
        <div>
            <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="options-menu" aria-haspopup="true" aria-expanded="true">
                {{auth()->user()->prenom}}
                <!-- Icone de menu déroulant -->
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
            <div class="py-1 dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Se déconnecter</button>
                </form>
            </div>
        </div>
    </div>
</nav>
<div class="p-6">
    <!-- Contenu du tableau de bord -->
    <h2 class="text-2xl font-bold mb-4">Bienvenue sur le tableau de bord</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Liste des Clients</h3>
            <a href="{{route('users.index')}}" class="text-blue-500 hover:text-blue-700">Voir la liste</a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-2">Ajouter un client</h3>
            <a href="{{route('users.create')}}" class="text-blue-500 hover:text-blue-700">Ajouter</a>
        </div>
    </div>
</div>

@endsection
