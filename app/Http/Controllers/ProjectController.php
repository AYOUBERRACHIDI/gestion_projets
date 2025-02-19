<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }


    public function index(Request $request)
    {
        $projects = Project::where('user_id', auth()->id()) 
                            ->when($request->priority, function($query) use ($request) {
                                return $query->where('priority', $request->priority);
                            })
                            // ->when($request->status, function($query) use ($request) {
                            //     return $query->where('status', $request->status);
                            // })
                            ->get();

        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'github_link' => 'nullable|url', 
            'priority' => 'required|in:low,medium,high', 
        ]);


        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'priority' => $request->priority,
            'user_id' => auth()->id(), 
        ]);

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
    }

    public function show(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('projects.show', compact('project'));
    }

    

    public function edit(Project $project)
    {
        
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('projects.edit', compact('project'));
    }

    

    public function update(Request $request, Project $project)
    {

        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'github_link' => 'nullable|url', 
            'priority' => 'required|in:low,medium,high', 
        ]);


        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'priority' => $request->priority,
        ]);

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function destroy(Project $project)
    {
        
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Projet supprimé.');
    }
}
