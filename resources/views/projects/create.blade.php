@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Titre de la page -->
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Créer un Nouveau Projet</h2>

    <!-- Formulaire de création -->
    <form action="{{ route('projects.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Champ Nom du Projet -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom du Projet</label>
            <input type="text" name="name" id="name" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Champ Description -->
        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <div class="mb-6">
    <label for="github_link" class="block text-sm font-medium text-gray-700 mb-2">Lien GitHub</label>
    <input type="url" name="github_link" id="github_link"
           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
</div>

<div class="mb-6">
    <label for="priority" class="block text-sm font-medium text-gray-700 mb-2">Priorité</label>
    <select name="priority" id="priority" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="low">Faible</option>
        <option value="medium">Moyenne</option>
        <option value="high">Élevée</option>
    </select>
</div>
        <!-- Bouton de soumission -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Créer
            </button>
        </div>
    </form>
</div>
@endsection