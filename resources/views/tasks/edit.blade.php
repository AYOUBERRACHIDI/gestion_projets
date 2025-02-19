@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <!-- Titre de la page -->
    <h2 class="text-5xl font-semibold text-gray-900 mb-10 text-center">Modifier la Tâche</h2>

    <!-- Formulaire de modification -->
    <form action="{{ route('tasks.update', ['project' => $project->id, 'task' => $task->id]) }}" method="POST" class="bg-white p-8 rounded-xl shadow-2xl border border-gray-100 max-w-4xl mx-auto">
        @csrf
        @method('PUT')

        <!-- Champ Titre -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Titre de la tâche</label>
            <div class="relative">
                <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required
                       class="w-full px-6 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-300 ease-in-out">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <path fill-rule="evenodd" d="M4 4a1 1 0 011-1h10a1 1 0 011 1v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4zm11 1H5v10h10V5z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            @error('title')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Champ Description -->
        <div class="mb-6">
            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description de la tâche</label>
            <div class="relative">
                <textarea name="description" id="description" rows="4" required
                            class="w-full px-6 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-300 ease-in-out">{{ old('description', $task->description) }}</textarea>
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <path fill-rule="evenodd" d="M4 4a1 1 0 011-1h10a1 1 0 011 1v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4zm11 1H5v10h10V5z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            @error('description')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Champ Statut -->
        <div class="mb-6">
            <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Statut</label>
            <select name="status" id="status"
                    class="w-full px-6 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-300 ease-in-out">
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
            <label for="priority" class="block text-sm font-semibold text-gray-700 mb-2">Priorité</label>
            <select name="priority" id="priority"
                    class="w-full px-6 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-300 ease-in-out">
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
            <label for="start_date" class="block text-sm font-semibold text-gray-700 mb-2">Date de début</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $task->start_date ? $task->start_date->format('Y-m-d') : '') }}"
                   class="w-full px-6 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-300 ease-in-out">
            @error('start_date')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Champ Date de fin -->
        <div class="mb-6">
            <label for="end_date" class="block text-sm font-semibold text-gray-700 mb-2">Date de fin</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $task->end_date ? $task->end_date->format('Y-m-d') : '') }}"
                   class="w-full px-6 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-300 ease-in-out">
            @error('end_date')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Bouton de soumission -->
        <div class="flex justify-center mt-8">
            <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-8 py-3 rounded-lg text-lg font-semibold hover:from-blue-600 hover:to-indigo-600 transition-all duration-300 ease-in-out transform hover:scale-105">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
