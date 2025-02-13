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

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
