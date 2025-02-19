@extends('layouts.app')

@section('content')
<style>
    /* Sidebar */
    #sidebar {
        background-color: #343a40; /* Couleur de fond sombre */
        backdrop-filter: blur(10px); /* Effet de flou */
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1); /* Ombre portée */
    }

    #sidebar .nav-link {
        color: #adb5bd; /* Couleur de texte par défaut */
        padding: 10px 15px;
        margin: 5px 0;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    #sidebar .nav-link:hover {
        background-color: #495057; /* Couleur de fond au survol */
        color: #ffffff; /* Couleur de texte au survol */
    }

    #sidebar .nav-link.active {
        background-color: #007bff; /* Couleur de fond pour l'élément actif */
        color: #ffffff; /* Couleur de texte pour l'élément actif */
    }

    #sidebar .nav-link i {
        margin-right: 10px;
    }

    /* Stats Cards */
    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    .display-4 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    /* Projects List */
    .card-header {
        background-color: #007bff; /* Couleur de fond de l'en-tête */
        color: #ffffff; /* Couleur de texte de l'en-tête */
        padding: 15px;
        border-radius: 10px 10px 0 0;
    }

    .table-responsive {
        margin-top: 20px;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table thead th {
        background-color: #343a40; /* Couleur de fond de l'en-tête du tableau */
        color: #ffffff; /* Couleur de texte de l'en-tête du tableau */
        padding: 15px;
        border: none;
    }

    .table tbody tr {
        background-color: #ffffff; /* Couleur de fond des lignes */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Ombre portée */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .table tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .table tbody td {
        padding: 15px;
        vertical-align: middle;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.9rem;
    }

    .badge.bg-info {
        background-color: #17a2b8; /* Couleur de fond pour le badge info */
    }

    .badge.bg-warning {
        background-color: #ffc107; /* Couleur de fond pour le badge warning */
    }

    .badge.bg-success {
        background-color: #28a745; /* Couleur de fond pour le badge success */
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 0.875rem;
        border-radius: 5px;
    }

    .btn-outline-info {
        color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-outline-info:hover {
        background-color: #17a2b8;
        color: #ffffff;
    }

    .btn-outline-warning {
        color: #ffc107;
        border-color: #ffc107;
    }

    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: #ffffff;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar shadow-lg" style="min-height: 100vh;">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold {{ request()->routeIs('projects.index') ? 'active' : '' }}" href="{{ route('projects.index') }}">
                            <i class="fas fa-project-diagram me-2"></i> Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold {{ request()->routeIs('settings.index') ? 'active' : '' }}" href="{{ route('settings.index') }}">
                            <i class="fas fa-cog me-2"></i> Settings
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-primary fw-bold">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="{{ route('projects.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fas fa-plus"></i> New Project
                    </a>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #007bff, #6610f2);">
                        <div class="card-body text-white text-center">
                            <h5 class="card-title fw-light">Total Projects</h5>
                            <p class="display-4 fw-bold">{{ $totalProjects }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #28a745, #20c997);">
                        <div class="card-body text-white text-center">
                            <h5 class="card-title fw-light">Completed Tasks</h5>
                            <p class="display-4 fw-bold">{{ $completedTasks }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">
                        <div class="card-body text-white text-center">
                            <h5 class="card-title fw-light">Pending Tasks</h5>
                            <p class="display-4 fw-bold">{{ $pendingTasks }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects List -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-primary text-white fw-bold">
                            <h5>My Projects</h5>
                        </div>
                        <div class="card-body">
                            @if ($projects->isEmpty())
                                <p class="text-muted">No projects found. <a href="{{ route('projects.create') }}" class="text-primary fw-bold">Create a new project</a>.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead class="bg-dark text-white">
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
                                                    <td class="fw-bold text-dark">{{ $project->name }}</td>
                                                    <td>{{ Str::limit($project->description, 50) }}</td>
                                                    <td class="text-center"><span class="badge bg-info">{{ $project->tasks->count() }}</span></td>
                                                    <td>
                                                        @if ($project->tasks->where('status', 'pending')->count() > 0)
                                                            <span class="badge bg-warning">In Progress</span>
                                                        @else
                                                            <span class="badge bg-success">Completed</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-info btn-sm">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>
                                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-warning btn-sm">
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
        </main>
    </div>
</div>
@endsection