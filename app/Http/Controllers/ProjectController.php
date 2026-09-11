```php
<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Menampilkan form tambah project.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Menyimpan project baru.
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
     * Menampilkan form edit project.
     *
     * US-07
     */
    public function edit(Project $project)
    {
        $this->authorizeOwner($project);

        return view('projects.edit', compact('project'));
    }

    /**
     * Mengubah project.
     *
     * US-07
     */
    public function update(Request $request, Project $project)
    {
        $this->authorizeOwner($project);

        $validated = $request->validate([
```
