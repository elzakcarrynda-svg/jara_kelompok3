<!DOCTYPE html>
<html>
<head>
    <title>Tambah Task</title>
</head>
<body>

    <h1>Tambah Task</h1>

    <form action="{{ route('projects.tasks.store', $project) }}" method="POST">
        @csrf

        <label>Judul</label><br>
        <input type="text" name="title" value="{{ old('title') }}">
        <br><br>

        <label>Deskripsi</label><br>
        <textarea name="description">{{ old('description') }}</textarea>
        <br><br>

        <label>Priority</label><br>
        <select name="priority">
            <option value="low">Low</option>
            <option value="medium" selected>Medium</option>
            <option value="high">High</option>
        </select>
        <br><br>

        <label>Deadline</label><br>
        <input type="date" name="deadline" value="{{ old('deadline') }}">
        <br><br>

        <label>Status</label><br>
        <select name="status">
            <option value="todo">Todo</option>
            <option value="doing">Doing</option>
            <option value="done">Done</option>
        </select>
        <br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('projects.tasks.index', $project) }}">Kembali</a>

</body>
</html>