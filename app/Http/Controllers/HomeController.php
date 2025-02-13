<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Afficher le tableau de bord avec les projets et les tâches.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer tous les projets de l'utilisateur connecté
        $projects = Project::where('user_id', auth()->id())->get();

        // Récupérer les tâches associées aux projets de l'utilisateur
        $tasks = Task::whereIn('project_id', $projects->pluck('id'))->get();

        // Statistiques pour le tableau de bord
        $totalProjects = $projects->count();
        $completedTasks = $tasks->where('status', 'completed')->count();
        $pendingTasks = $tasks->where('status', 'pending')->count();
        $overdueTasks = $tasks->where('due_date', '<', now())->where('status', '!=', 'completed')->count();

        return view('home', compact('projects', 'tasks', 'totalProjects', 'completedTasks', 'pendingTasks', 'overdueTasks'));
    }
}