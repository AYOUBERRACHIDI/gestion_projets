@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">



    <h2 class="text-3xl font-bold text-gray-800 mb-6">Mes Projets</h2>

    <div class="flex justify-end mb-6">
        <a href="{{ route('projects.create') }}" class="btn btn-primary bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
            Créer un Projet
        </a>
    </div>


    <div class="mb-6">
        <form action="{{ route('projects.index') }}" method="GET" class="flex space-x-4">
            <div>
                <label for="priority" class="block text-sm font-medium text-gray-700">Priorité</label>
                <select name="priority" id="priority" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <option value="">Toutes</option>
                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Faible</option>
                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Moyenne</option>
                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>Élevée</option>
                </select>
            </div>
            
            <div class="self-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                    Filtrer
                </button>
            </div>
        </form>
    </div>



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
                        <strong>Description :</strong> {{ $project->description }}
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        <strong>Lien GitHub :</strong>
                        <a href="{{ $project->github_link }}" class="text-blue-500 hover:underline" target="_blank">
                            {{ $project->github_link }}
                        </a>
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        <strong>Priorité :</strong>
                        <span class="font-medium {{ $project->priority == 'low' ? 'text-green-500' : ($project->priority == 'medium' ? 'text-yellow-500' : 'text-red-500') }}">
                            {{ ucfirst($project->priority) }}
                        </span>
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        Dernière mise à jour : {{ $project->updated_at->diffForHumans() }}
                    </p>
                </div>



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