<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
</head>
<body>

    <h1>Tasks - {{ $project->name }}</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('projects.tasks.create', $project) }}">Tambah Task</a>
    <br><br>

    @if ($tasks->count() > 0)
        @foreach ($tasks as $task)
            <div>
                <h3>{{ $task->title }}</h3>
                <p>{{ $task->description }}</p>
                <p>Priority: {{ $task->priority }}</p>
                <p>Status: {{ $task->status }}</p>
                <p>Deadline: {{ $task->deadline }}</p>

                <a href="{{ route('projects.tasks.edit', [$project, $task]) }}">
                    Edit
                </a>

                <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </div>
            <hr>
        @endforeach
    @else
        <p>Belum ada task.</p>
    @endif

</body>
</html>