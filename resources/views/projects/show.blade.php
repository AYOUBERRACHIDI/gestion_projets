@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- En-tête du projet -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">{{ $project->name }}</h2>
        <p class="mt-2 text-lg text-gray-600">{{ $project->description }}</p>
    </div>

    <!-- Liste des tâches -->
    <div class="mb-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Tâches</h3>
        <div class="space-y-4">
            @foreach ($project->tasks as $task)
                <div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
                    <div>
                        <strong class="text-lg text-gray-800">{{ $task->title }}</strong>
                        <span class="ml-2 text-sm font-medium px-3 py-1 rounded-full 
                            {{ $task->status == 'completed' ? 'bg-green-100 text-green-800' : 
                               ($task->status == 'in_progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                            {{ ucfirst($task->status) }}
                        </span>
                    </div>
                    <div class="flex space-x-2">
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

    <!-- Formulaire pour ajouter une tâche -->
    <div class="mb-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Ajouter une Tâche</h3>
        <form action="{{ route('tasks.store', $project) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="flex flex-col space-y-4">
                <input type="text" name="title" placeholder="Nom de la tâche" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <select name="status" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="pending">En attente</option>
                    <option value="in_progress">En cours</option>
                    <option value="completed">Terminée</option>
                </select>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Ajouter</button>
            </div>
        </form>
    </div>
</div>
@endsection