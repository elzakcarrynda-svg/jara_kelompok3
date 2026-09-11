<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Menampilkan form membuat task.
     *
     * US-09
     */
    public function create(Project $project)
    {
        abort_unless(
            $project->owner_id === auth()->id(),
            403
        );

        return view(
            'task.create',
            compact('project')
        );
    }

    /**
     * Menyimpan task baru.
     *
     * US-09, US-11, US-12
     */
    public function store(
        Request $request,
        Project $project
    ) {
        abort_unless(
            $project->owner_id === auth()->id(),
            403
        );

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'deadline' => 'nullable|date',
            'status' => 'required|in:todo,doing,done',
        ]);

        $project->tasks()->create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'priority' => $validated['priority'],
            'deadline' => $validated['deadline'] ?? null,
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Task berhasil dibuat.');
    }

    /**
     * Menampilkan form edit task.
     *
     * US-10
     */
    public function edit(Task $task)
    {
        abort_unless(
            $task->project->owner_id === auth()->id(),
            403
        );

        return view(
            'task.edit',
            compact('task')
        );
    }

    /**
     * Mengubah task.
     *
     * US-10, US-11, US-12
     */
    public function update(
        Request $request,
        Task $task
    ) {
        abort_unless(
            $task->project->owner_id === auth()->id(),
            403
        );

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'deadline' => 'nullable|date',
            'status' => 'required|in:todo,doing,done',
        ]);

        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'priority' => $validated['priority'],
            'deadline' => $validated['deadline'] ?? null,
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('projects.show', $task->project)
            ->with('success', 'Task berhasil diperbarui.');
    }

    /**
     * Menghapus task.
     *
     * US-10
     */
    public function destroy(Task $task)
    {
        abort_unless(
            $task->project->owner_id === auth()->id(),
            403
        );

        $project = $task->project;

        $task->delete();

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Task berhasil dihapus.');
    }
}