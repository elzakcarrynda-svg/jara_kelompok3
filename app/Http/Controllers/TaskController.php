```php
<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Menampilkan daftar task dalam project.
     *
     * US-09
     */
    public function index(Project $project)
    {
        $this->checkProjectAccess($project);

        $tasks = $project->tasks()->latest()->get();

        return view('task.index', compact('project', 'tasks'));
    }

    /**
     * Menampilkan form membuat task.
     *
     * US-09
     */
    public function create(Project $project)
    {
        $this->checkProjectAccess($project);

        return view('task.create', compact('project'));
    }

    /**
     * Menyimpan task baru.
     *
     * US-09, US-11, US-12
     */
    public function store(Request $request, Project $project)
    {
        $this->checkProjectAccess($project);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', 'in:low,medium,high'],
            'deadline' => ['nullable', 'date'],
            'status' => ['required', 'in:todo,doing,done'],
        ]);

        $project->tasks()->create($validated);

        return redirect()
            ->route('projects.tasks.index', $project)
            ->with('success', 'Task berhasil dibuat.');
    }

    /**
     * Menampilkan form edit task.
     *
     * US-10
     */
    public function edit(Project $project, Task $task)
    {
        $this->checkTaskAccess($project, $task);

        return view('task.edit', compact('project', 'task'));
    }

    /**
     * Mengubah task.
     *
     * US-10, US-11, US-12
     */
    public function update(
        Request $request,
        Project $project,
        Task $task
    ) {
        $this->checkTaskAccess($project, $task);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', 'in:low,medium,high'],
            'deadline' => ['nullable', 'date'],
            'status' => ['required', 'in:todo,doing,done'],
        ]);

        $task->update($validated);

        return redirect()
            ->route('projects.tasks.index', $project)
            ->with('success', 'Task berhasil diperbarui.');
    }

    /**
     * Menghapus task.
     *
     * US-10
     */
    public function destroy(Project $project, Task $task)
    {
        $this->checkTaskAccess($project, $task);

        $task->delete();

        return redirect()
            ->route('projects.tasks.index', $project)
            ->with('success', 'Task berhasil dihapus.');
    }

    /**
     * Mengecek apakah user boleh mengakses project.
     *
     * User boleh mengakses jika:
     * - User adalah owner project
     * - User merupakan member project
     */
    private function checkProjectAccess(Project $project)
    {
        $userId = Auth::id();

        $isOwner = $project->owner_id === $userId;

        $isMember = $project->members()
            ->where('users.id', $userId)
            ->exists();

        if (!$isOwner && !$isMember) {
            abort(403);
        }
    }

    /**
     * Mengecek apakah task benar-benar berada
     * di project yang sedang diakses dan user
     * memiliki akses ke project tersebut.
     */
    private function checkTaskAccess(Project $project, Task $task)
    {
        if ($task->project_id !== $project->id) {
            abort(404);
        }

        $this->checkProjectAccess($project);
    }
}
```
