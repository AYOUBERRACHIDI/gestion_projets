@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Project</h1>
        
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Project Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $project->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Project Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="mb-3">
    <label for="github_link" class="form-label">Lien GitHub</label>
    <input type="url" name="github_link" id="github_link" class="form-control" value="{{ old('github_link', $project->github_link) }}">
</div>

<div class="mb-3">
    <label for="priority" class="form-label">Priorité</label>
    <select name="priority" id="priority" class="form-control">
        <option value="low" {{ $project->priority == 'low' ? 'selected' : '' }}>Faible</option>
        <option value="medium" {{ $project->priority == 'medium' ? 'selected' : '' }}>Moyenne</option>
        <option value="high" {{ $project->priority == 'high' ? 'selected' : '' }}>Élevée</option>
    </select>
</div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
