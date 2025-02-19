<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    public function store(Request $request, Project $project)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|in:pending,in_progress,completed',
        'priority' => 'required|in:low,medium,high', // Validation pour la priorité
        'start_date' => 'nullable|date',             // Validation pour la date de début
        'end_date' => 'nullable|date|after_or_equal:start_date', // Validation pour la date de fin
    ]);

    $project->tasks()->create($request->all());

    return redirect()->route('projects.show', $project)->with('success', 'Tâche ajoutée.');
}

    public function edit($projectId, $taskId)
    {
        $project = Project::findOrFail($projectId);  
        $task = Task::findOrFail($taskId);
    
        return view('tasks.edit', compact('task', 'project'));
    }
    


    public function update(Request $request, Project $project, Task $task)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|in:pending,in_progress,completed',
        'priority' => 'required|in:low,medium,high', // Validation pour la priorité
        'start_date' => 'nullable|date',             // Validation pour la date de début
        'end_date' => 'nullable|date|after_or_equal:start_date', // Validation pour la date de fin
    ]);

    $task->update($request->all());

    return redirect()->route('projects.show', $project)->with('success', 'Tâche mise à jour.');
}
    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return redirect()->route('projects.show', $project)->with('success', 'Tâche supprimée.');
    }
}
