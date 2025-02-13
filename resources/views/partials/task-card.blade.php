<div class="bg-white p-6 rounded-lg shadow-md flex justify-between items-center">
    <div>
        <strong class="text-lg text-gray-800">{{ $task->title }}</strong>
        <p class="text-sm text-gray-600">{{ $task->description }}</p>
        <p class="text-sm text-gray-600">Début : {{ $task->start_date }}</p>
        <p class="text-sm text-gray-600">Fin : {{ $task->end_date }}</p>
        <span class="text-sm font-medium px-3 py-1 rounded-full 
            {{ $task->status == 'completed' ? 'bg-green-100 text-green-800' : 
               ($task->status == 'in_progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
            {{ ucfirst($task->status) }}
        </span>
    </div>
    <div class="flex space-x-2">
        <a href="{{ route('tasks.edit', [$task->project, $task]) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">Modifier</a>
        <form action="{{ route('tasks.destroy', [$task->project, $task]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">Supprimer</button>
        </form>
    </div>
</div>