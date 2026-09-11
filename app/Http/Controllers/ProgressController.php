<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\Task;

class ProgressController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // Project yang dimiliki user
        $ownedProjects = Project::where('owner_id', $userId)->get();

        // Project yang diikuti user sebagai member
        $memberProjectIds = ProjectMember::where('user_id', $userId)
            ->pluck('project_id');

        $memberProjects = Project::whereIn('id', $memberProjectIds)->get();

        // Gabungkan project milik sendiri dan project yang diikuti
        $projects = $ownedProjects->merge($memberProjects);

        foreach ($projects as $project) {
            $totalTasks = Task::where('project_id', $project->id)->count();

            $doneTasks = Task::where('project_id', $project->id)
                ->where('status', 'done')
                ->count();

            if ($totalTasks > 0) {
                $project->progress = ($doneTasks / $totalTasks) * 100;
            } else {
                $project->progress = 0;
            }
        }

        return view('progress.index', compact('projects'));
    }
}