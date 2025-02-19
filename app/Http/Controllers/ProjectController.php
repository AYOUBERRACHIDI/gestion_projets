<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Assure que toutes les actions nécessitent une authentification
    }

    // Liste des projets de l'utilisateur connecté avec possibilité de filtrer par priorité et statut
    public function index(Request $request)
    {
        // Récupérer les projets de l'utilisateur connecté avec des filtres si présents
        $projects = Project::where('user_id', auth()->id()) // Filtrer par utilisateur
                           ->when($request->priority, function($query) use ($request) {
                               return $query->where('priority', $request->priority);
                           })
                           ->when($request->status, function($query) use ($request) {
                               return $query->where('status', $request->status);
                           })
                           ->get();

        return view('projects.index', compact('projects'));
    }

    // Affiche le formulaire pour créer un projet
    public function create()
    {
        return view('projects.create');
    }

    // Enregistre un projet créé par l'utilisateur connecté
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'github_link' => 'nullable|url', // Validation pour le lien GitHub
            'priority' => 'required|in:low,medium,high', // Validation pour la priorité
        ]);

        // Créer un projet associé à l'utilisateur connecté
        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'priority' => $request->priority,
            'user_id' => auth()->id(), // Associer le projet à l'utilisateur connecté
        ]);

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
    }

    // Affiche un projet spécifique si l'utilisateur connecté est le propriétaire
    public function show(Project $project)
    {
        // Vérifier si l'utilisateur connecté est bien le propriétaire du projet
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('projects.show', compact('project'));
    }

    // Affiche le formulaire pour modifier un projet
    public function edit(Project $project)
    {
        // Vérifier si l'utilisateur connecté est bien le propriétaire du projet
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('projects.edit', compact('project'));
    }

    // Met à jour un projet existant
    public function update(Request $request, Project $project)
    {
        // Vérifier si l'utilisateur connecté est bien le propriétaire du projet
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'github_link' => 'nullable|url', // Validation pour le lien GitHub
            'priority' => 'required|in:low,medium,high', // Validation pour la priorité
        ]);

        // Mettre à jour les informations du projet
        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'priority' => $request->priority,
        ]);

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    // Supprime un projet
    public function destroy(Project $project)
    {
        // Vérifier si l'utilisateur connecté est bien le propriétaire du projet
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Supprimer le projet
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projet supprimé.');
    }
}
