@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- En-tête du projet -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">{{ $project->name }}</h2>
        <p class="mt-2 text-lg text-gray-600">{{ $project->description }}</p>

        <!-- Lien GitHub -->
        <p class="mt-2 text-lg text-gray-600">
            <strong>Lien GitHub :</strong>
            <a href="{{ $project->github_link }}" class="text-blue-500 hover:underline" target="_blank">
                {{ $project->github_link }}
            </a>
        </p>

        <!-- Priorité du projet -->
        <p class="mt-2 text-lg text-gray-600">
            <strong>Priorité :</strong>
            <span class="font-medium {{ $project->priority == 'low' ? 'text-green-500' : ($project->priority == 'medium' ? 'text-yellow-500' : 'text-red-500') }}">
                {{ ucfirst($project->priority) }}
            </span>
        </p>
    </div>

    <!-- Bouton pour ouvrir le modal -->
    <div class="mb-6 flex justify-end">
        <button id="openModalButton" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
            Ajouter une Tâche
        </button>
    </div>

    <!-- Liste des tâches -->
    <div class="mb-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Tâches</h3>
        <div class="space-y-4">
            @foreach ($project->tasks as $task)
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                <div>
                    <strong class="text-lg text-gray-800">{{ $task->title }}</strong>
                    <p class="text-sm text-gray-600 mt-1">{{ $task->description }}</p>
                    <p class="text-sm text-gray-500 mt-1">
                        <strong>Priorité :</strong>
                        <span class="font-medium {{ $task->priority == 'low' ? 'text-green-500' : ($task->priority == 'medium' ? 'text-yellow-500' : 'text-red-500') }}">
                            {{ ucfirst($task->priority) }}
                        </span>
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        <strong>Dates :</strong> {{ $task->start_date ? $task->start_date->format('d/m/Y') : 'N/A' }} - {{ $task->end_date ? $task->end_date->format('d/m/Y') : 'N/A' }}
                    </p>
                    <span class="ml-2 text-sm font-medium px-3 py-1 rounded-full 
                        {{ $task->status == 'completed' ? 'bg-green-100 text-green-800' : 
                        ($task->status == 'in_progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                        {{ ucfirst($task->status) }}
                    </span>
                </div>
                <div class="flex space-x-2 mt-4">
                    <a href="{{ route('tasks.edit', [$project, $task]) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">Modifier</a>
                    <form action="{{ route('tasks.destroy', [$project, $task]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">Supprimer</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="taskModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Ajouter une Tâche</h3>
            <form action="{{ route('tasks.store', $project) }}" method="POST" class="space-y-4">
                @csrf
                <!-- Titre de la tâche -->
                <div>
                    <input type="text" name="title" placeholder="Nom de la tâche" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description de la tâche -->
                <div>
                    <textarea name="description" placeholder="Description de la tâche" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Statut de la tâche -->
                <div>
                    <select name="status" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                        <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>En cours</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Terminée</option>
                    </select>
                    @error('status')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Priorité de la tâche -->
                <div>
                    <select name="priority" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Faible</option>
                        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Moyenne</option>
                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>Élevée</option>
                    </select>
                    @error('priority')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date de début -->
                <div>
                    <input type="date" name="start_date" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('start_date') ?: date('Y-m-d') }}">
                    @error('start_date')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date de fin -->
                <div>
                    <input type="date" name="end_date" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('end_date') ?: date('Y-m-d') }}">
                    @error('end_date')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Ajouter</button>
            </form>

            <!-- Bouton de fermeture -->
            <button id="closeModalButton" class="absolute top-4 right-4 text-gray-600 hover:text-gray-800">
                &times;
            </button>
        </div>
    </div>
</div>

<script>
    // Ouvrir le modal
    document.getElementById('openModalButton').addEventListener('click', function() {
        document.getElementById('taskModal').classList.remove('hidden');
    });

    // Fermer le modal
    document.getElementById('closeModalButton').addEventListener('click', function() {
        document.getElementById('taskModal').classList.add('hidden');
    });

    // Fermer le modal si l'utilisateur clique en dehors
    window.addEventListener('click', function(event) {
        if (event.target === document.getElementById('taskModal')) {
            document.getElementById('taskModal').classList.add('hidden');
        }
    });
</script>
@endsection
