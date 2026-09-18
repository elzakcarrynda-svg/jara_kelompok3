<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>

    <h1>Edit Task</h1>

    <form action="{{ route('projects.tasks.update', [$project, $task]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Judul</label><br>
        <input type="text" name="title" value="{{ old('title', $task->title) }}">
        <br><br>

        <label>Deskripsi</label><br>
        <textarea name="description">{{ old('description', $task->description) }}</textarea>
        <br><br>

        <label>Priority</label><br>
        <select name="priority">
            <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
            <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
        </select>
        <br><br>

        <label>Deadline</label><br>
        <input type="date" name="deadline" value="{{ old('deadline', $task->deadline ? date('Y-m-d', strtotime($task->deadline)) : '') }}">
        <br><br>

        <label>Status</label><br>
        <select name="status">
            <option value="todo" {{ $task->status == 'todo' ? 'selected' : '' }}>Todo</option>
            <option value="doing" {{ $task->status == 'doing' ? 'selected' : '' }}>Doing</option>
            <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
        </select>
        <br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="{{ route('projects.tasks.index', $project) }}">Kembali</a>

</body>
</html>