<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

class ProjectPolicy
{

    public function update(User $user, Project $project): bool
    {
        return $user->id === $project->owner_id;
    }


    public function delete(User $user, Project $project): bool
    {
        return $user->id === $project->owner_id;
    }


    public function view(User $user, Project $project): bool
    {
        return $user->id === $project->owner_id;
    }

}
