@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Paramètres</h1>

    <!-- Profil Utilisateur -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-semibold mb-4">Profil Utilisateur</h2>
        <form action="{{ route('settings.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Mettre à jour</button>
        </form>
    </div>

    <!-- Changer le mot de passe -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-semibold mb-4">Changer le mot de passe</h2>
        <form action="{{ route('settings.password.update') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="current_password" class="block text-sm font-medium text-gray-700">Mot de passe actuel</label>
                <input type="password" name="current_password" id="current_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label for="new_password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                <input type="password" name="new_password" id="new_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input type="password" name="confirm_password" id="confirm_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Mettre à jour</button>
        </form>
    </div>

    <!-- Supprimer le compte -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-semibold mb-4">Supprimer le compte</h2>
        <form action="{{ route('settings.account.delete') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="confirm_delete" class="block text-sm font-medium text-gray-700">Tapez "DELETE" pour confirmer</label>
                <input type="text" name="confirm_delete" id="confirm_delete" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Supprimer le compte</button>
        </form>
    </div>

    <!-- <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Préférences de l'application</h2>
        <form action="{{ route('settings.preferences.update') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="language" class="block text-sm font-medium text-gray-700">Langue</label>
<select name="language" id="language" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    <option value="fr" {{ Auth::user()->language === 'fr' ? 'selected' : '' }}>Français</option>
    <option value="en" {{ Auth::user()->language === 'en' ? 'selected' : '' }}>Anglais</option>
    <option value="es" {{ Auth::user()->language === 'es' ? 'selected' : '' }}>Espagnol</option>
</select>

<select name="theme" id="theme" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    <option value="light" {{ Auth::user()->theme === 'light' ? 'selected' : '' }}>Clair</option>
    <option value="dark" {{ Auth::user()->theme === 'dark' ? 'selected' : '' }}>Sombre</option>
</select>

<input type="checkbox" name="notifications[email]" class="rounded border-gray-300 text-blue-500 shadow-sm" {{ json_decode(Auth::user()->notifications)->email ?? false ? 'checked' : '' }}>
<input type="checkbox" name="notifications[push]" class="rounded border-gray-300 text-blue-500 shadow-sm" {{ json_decode(Auth::user()->notifications)->push ?? false ? 'checked' : '' }}>

<select name="date_format" id="date_format" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    <option value="Y-m-d" {{ Auth::user()->date_format === 'Y-m-d' ? 'selected' : '' }}>YYYY-MM-DD</option>
    <option value="d-m-Y" {{ Auth::user()->date_format === 'd-m-Y' ? 'selected' : '' }}>DD-MM-YYYY</option>
    <option value="m/d/Y" {{ Auth::user()->date_format === 'm/d/Y' ? 'selected' : '' }}>MM/DD/YYYY</option>
</select>

<select name="time_format" id="time_format" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    <option value="H:i:s" {{ Auth::user()->time_format === 'H:i:s' ? 'selected' : '' }}>24 heures</option>
    <option value="h:i A" {{ Auth::user()->time_format === 'h:i A' ? 'selected' : '' }}>12 heures</option>
</select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Mettre à jour</button>
        </form>
    </div> -->
</div>
@endsection