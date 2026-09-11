<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\User;
use App\Policies\ProjectMemberPolicy;
use Illuminate\Http\Request;

class ProjectMemberController extends Controller
{
    public function index(Project $project)
    {
        $members = ProjectMember::where('project_id', $project->id)
            ->with('user')
            ->get();

        $memberIds = $members->pluck('user_id');

        $users = User::whereNotIn('id', $memberIds)
            ->where('id', '!=', $project->owner_id)
            ->get();

        return view('members.index', compact('project', 'members', 'users'));
    }

    public function store(Request $request, Project $project)
    {
        $policy = new ProjectMemberPolicy();

        if (!$policy->manageMembers(auth()->user(), $project)) {
            abort(403);
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $alreadyMember = ProjectMember::where('project_id', $project->id)
            ->where('user_id', $request->user_id)
            ->exists();

        if ($alreadyMember) {
            return back()->with('error', 'User sudah menjadi member.');
        }

        ProjectMember::create([
            'project_id' => $project->id,
            'user_id' => $request->user_id,
        ]);

        return redirect()
            ->route('projects.members.index', $project)
            ->with('success', 'Member berhasil ditambahkan.');
    }

    public function destroy(Project $project, User $user)
    {
        $policy = new ProjectMemberPolicy();

        if (!$policy->manageMembers(auth()->user(), $project)) {
            abort(403);
        }

        ProjectMember::where('project_id', $project->id)
            ->where('user_id', $user->id)
            ->delete();

        return redirect()
            ->route('projects.members.index', $project)
            ->with('success', 'Member berhasil dihapus.');
    }
}