<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        $this->checkProjectAccess($project);

        $tasks = $project->tasks()->latest()->get();

        return view('task.index', compact('project', 'tasks'));
    }

    public function create(Project $project)
    {
        $this->checkProjectAccess($project);

        return view('task.create', compact('project'));
    }

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

    public function edit(Project $project, Task $task)
    {
        $this->checkTaskAccess($project, $task);

        return view('task.edit', compact('project', 'task'));
    }

    public function update(Request $request, Project $project, Task $task)
    {
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

    public function destroy(Project $project, Task $task)
    {
        $this->checkTaskAccess($project, $task);

        $task->delete();

        return redirect()
            ->route('projects.tasks.index', $project)
            ->with('success', 'Task berhasil dihapus.');
    }

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

    private function checkTaskAccess(Project $project, Task $task)
    {
        if ($task->project_id !== $project->id) {
            abort(404);
        }

        $this->checkProjectAccess($project);
    }
}