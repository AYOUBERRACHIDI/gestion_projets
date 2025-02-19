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
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('title')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Champ Description -->
        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description de la tâche</label>
            <textarea name="description" id="description" rows="4" required
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
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
            @error('status')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Champ Priorité -->
        <div class="mb-6">
            <label for="priority" class="block text-sm font-medium text-gray-700 mb-2">Priorité</label>
            <select name="priority" id="priority"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Faible</option>
                <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Moyenne</option>
                <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>Élevée</option>
            </select>
            @error('priority')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Champ Date de début -->
        <div class="mb-6">
            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Date de début</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $task->start_date ? $task->start_date->format('Y-m-d') : '') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('start_date')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Champ Date de fin -->
        <div class="mb-6">
            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Date de fin</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $task->end_date ? $task->end_date->format('Y-m-d') : '') }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('end_date')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
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
