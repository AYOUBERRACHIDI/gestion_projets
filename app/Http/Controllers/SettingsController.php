<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class SettingsController extends Controller
{
    // Afficher la page des paramètres
    public function index()
    {
        return view('settings.index');
    }

    // Mettre à jour le profil utilisateur
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mettre à jour le nom et l'email
        $user->name = $request->name;
        $user->email = $request->email;

        // Mettre à jour la photo de profil
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return redirect()->route('settings.index')->with('success', 'Profil mis à jour avec succès.');
    }

    // Changer le mot de passe
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()],
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        // Vérifier le mot de passe actuel
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Mettre à jour le mot de passe
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('settings.index')->with('success', 'Mot de passe mis à jour avec succès.');
    }

    // Supprimer le compte
    public function deleteAccount(Request $request)
    {
        $request->validate([
            'confirm_delete' => 'required|string|in:DELETE',
        ]);

        $user = Auth::user();
        $user->delete();

        return redirect()->route('welcome')->with('success', 'Votre compte a été supprimé avec succès.');
    }

    // Mettre à jour les préférences de l'application
    public function updatePreferences(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'language' => 'required|string|in:fr,en,es',
        'theme' => 'required|string|in:light,dark',
        'notifications' => 'nullable|array',
        'notifications.email' => 'nullable|boolean',
        'notifications.push' => 'nullable|boolean',
        'date_format' => 'required|string|in:Y-m-d,d-m-Y,m/d/Y',
        'time_format' => 'required|string|in:H:i:s,h:i A',
    ]);

    // Mettre à jour les préférences
    $user->update([
        'language' => $request->language,
        'theme' => $request->theme,
        'notifications' => json_encode($request->notifications),
        'date_format' => $request->date_format,
        'time_format' => $request->time_format,
    ]);

    return redirect()->route('settings.index')->with('success', 'Préférences mises à jour avec succès.');
}
}