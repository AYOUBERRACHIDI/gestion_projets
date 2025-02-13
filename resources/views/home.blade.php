@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                <li class="nav-item">
    <a class="nav-link active" href="{{ route('home') }}">
        <i class="fas fa-home"></i> Dashboard
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('projects.index') }}">
        <i class="fas fa-project-diagram"></i> Projects
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('settings.index') }}">
        <i class="fas fa-cog"></i> Settings
    </a>
</li>
                    <!-- Ajout du Calendrier -->
                    
                    <!-- Ajout de la Personnalisation -->
                    
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="{{ route('projects.create') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-plus"></i> New Project
                    </a>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Projects</h5>
                            <p class="card-text display-4">{{ $totalProjects }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Completed Tasks</h5>
                            <p class="card-text display-4">{{ $completedTasks }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pending Tasks</h5>
                            <p class="card-text display-4">{{ $pendingTasks }}</p>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Projects List -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            My Projects
                        </div>
                        <div class="card-body">
                            @if ($projects->isEmpty())
                                <p class="text-muted">No projects found. <a href="{{ route('projects.create') }}">Create a new project</a>.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Tasks</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $project)
                                                <tr>
                                                    <td>{{ $project->name }}</td>
                                                    <td>{{ Str::limit($project->description, 50) }}</td>
                                                    <td>{{ $project->tasks->count() }}</td>
                                                    <td>
                                                        @if ($project->tasks->where('status', 'pending')->count() > 0)
                                                            <span class="badge bg-warning">In Progress</span>
                                                        @else
                                                            <span class="badge bg-success">Completed</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>
                                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Tasks -->
            
        </main>
    </div>
</div>
@endsection