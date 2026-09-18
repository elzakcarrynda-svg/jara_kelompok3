<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    /**
     * Menampilkan daftar project milik user.
     */
    public function index()
    {
        $projects = Project::where('owner_id', Auth::id())
            ->latest()
            ->get();

        return view('projects.index', compact('projects'));
    }


    /**
     * Form tambah project.
     */
    public function create()
    {
        return view('projects.create');
    }


    /**
     * Simpan project baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Project::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'owner_id' => Auth::id(),
        ]);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project berhasil dibuat.');
    }


    /**
     * Detail project.
     */
    public function show(Project $project)
    {
        $this->checkProjectAccess($project);

        $project->load('tasks');

        return view(
            'projects.show',
            compact('project')
        );
    }


    /**
     * Form edit project.
     */
    public function edit(Project $project)
    {
        $this->authorizeOwner($project);

        return view(
            'projects.edit',
            compact('project')
        );
    }


    /**
     * Update project.
     */
    public function update(Request $request, Project $project)
    {
        $this->authorizeOwner($project);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $project->update($validated);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }


    /**
     * Hapus project.
     */
    public function destroy(Project $project)
    {
        $this->authorizeOwner($project);

        DB::transaction(function () use ($project) {

            $project->tasks()->delete();

            $project->members()->detach();

            $project->delete();

        });


        return redirect()
            ->route('projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }



    /**
     * Cek owner project.
     */
    private function authorizeOwner(Project $project)
    {
        if ($project->owner_id !== Auth::id()) {
            abort(403);
        }
    }


    /**
     * Cek akses owner/member.
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

}