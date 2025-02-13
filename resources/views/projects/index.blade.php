@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Titre de la page -->
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Mes Projets</h2>

    <!-- Bouton de création de projet -->
    <div class="flex justify-end mb-6">
        <a href="{{ route('projects.create') }}" class="btn btn-primary bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
            Créer un Projet
        </a>
    </div>

    <!-- Liste des projets -->
    <div class="space-y-4">
        @foreach ($projects as $project)
            <div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
                <!-- Informations du projet -->
                <div>
                    <h5 class="text-xl font-semibold text-gray-800">
                        <a href="{{ route('projects.show', $project) }}" class="hover:text-blue-500 transition duration-300">
                            {{ $project->name }}
                        </a>
                    </h5>
                    <p class="text-sm text-gray-500 mt-1">
                        Dernière mise à jour : {{ $project->updated_at->diffForHumans() }}
                    </p>
                </div>

                <!-- Actions (Modifier/Supprimer) -->
                <div class="flex space-x-2">
                    <a href="{{ route('projects.edit', $project) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
                        Modifier
                    </a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection