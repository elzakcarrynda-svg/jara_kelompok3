<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Menampilkan semua project milik user.
     */
    public function index()
    {
        $projects = Project::with('tasks')
            ->where('owner_id', auth()->id())
            ->latest()
            ->get();

        return view(
            'projects.index',
            compact('projects')
        );
    }

    /**
     * Menampilkan form membuat project.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Menyimpan project baru.
     *
     * US-06
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,

            'owner_id' => auth()->id(),
        ]);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project berhasil dibuat.');
    }

    /**
     * Menampilkan detail project beserta task.
     *
     * US-08
     */
    public function show(Project $project)
    {
        // User hanya boleh melihat project miliknya.
        abort_unless(
            $project->owner_id === auth()->id(),
            403
        );

        $project->load('tasks');

        return view(
            'projects.show',
            compact('project')
        );
    }

    /**
     * Menampilkan form edit project.
     *
     * US-07
     */
    public function edit(Project $project)
    {
        abort_unless(
            $project->owner_id === auth()->id(),
            403
        );

        return view(
            'projects.edit',
            compact('project')
        );
    }

    /**
     * Mengubah project.
     *
     * US-07
     */
    public function update(
        Request $request,
        Project $project
    ) {
        abort_unless(
            $project->owner_id === auth()->id(),
            403
        );

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Project berhasil diperbarui.');
    }

    /**
     * Menghapus project.
     *
     * US-07
     */
    public function destroy(Project $project)
    {
        abort_unless(
            $project->owner_id === auth()->id(),
            403
        );

        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }
}