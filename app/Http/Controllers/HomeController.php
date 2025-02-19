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
        
        $projects = Project::where('user_id', auth()->id())->get();



        $tasks = Task::whereIn('project_id', $projects->pluck('id'))->get();


        $totalProjects = $projects->count();
        $completedTasks = $tasks->where('status', 'completed')->count();
        $pendingTasks = $tasks->where('status', 'pending')->count();
        $overdueTasks = $tasks->where('due_date', '<', now())->where('status', '!=', 'completed')->count();

        return view('home', compact('projects', 'tasks', 'totalProjects', 'completedTasks', 'pendingTasks', 'overdueTasks'));
    }
}