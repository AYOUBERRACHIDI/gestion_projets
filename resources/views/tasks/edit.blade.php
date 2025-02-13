@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Titre de la page -->
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Modifier la Tâche</h2>

    <!-- Formulaire de modification -->
    <form action="{{ route('tasks.update', ['project' => $project->id, 'task' => $task->id]) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Champ Titre -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre de la tâche</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Champ Statut -->
        <div class="mb-6">
            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Statut</label>
            <select name="status" id="status"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>En cours</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Terminée</option>
            </select>
        </div>

        <!-- Bouton de soumission -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection