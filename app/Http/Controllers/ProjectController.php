<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    /**
     * Menampilkan daftar project milik user.
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
     * Form tambah project.
     */
    public function create()
    {
        return view('projects.create');
    }



    /**
     * Simpan project baru.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();


        Project::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'owner_id' => auth()->id(),
        ]);


        return redirect()
            ->route('projects.index')
            ->with('success','Project berhasil dibuat.');
    }



    /**
     * Detail project beserta task.
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);


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
        $this->authorize(
            'update',
            $project
        );


        return view(
            'projects.edit',
            compact('project')
        );
    }



    /**
     * Update project.
     */
    public function update(
        UpdateProjectRequest $request,
        Project $project
    ) {

        $this->authorize(
            'update',
            $project
        );


        $validated = $request->validated();


        $project->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);


        return redirect()
            ->route('projects.show', $project)
            ->with('success','Project berhasil diperbarui.');
    }



    /**
     * Hapus project beserta task dan member.
     */
    public function destroy(Project $project)
    {
        $this->authorize(
            'delete',
            $project
        );


        DB::transaction(function () use ($project) {


            $project->tasks()->delete();


            $project->members()->detach();


            $project->delete();


        });



        return redirect()
            ->route('projects.index')
            ->with('success','Project berhasil dihapus.');
    }

}