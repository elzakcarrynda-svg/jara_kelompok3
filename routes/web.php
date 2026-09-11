<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectMemberController;
use App\Http\Controllers\ProgressController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('projects', ProjectController::class);

    Route::resource('projects.tasks', TaskController::class)
        ->except(['show']);

    Route::get('/projects/{project}/members', [ProjectMemberController::class, 'index'])
        ->name('projects.members.index');

    Route::post('/projects/{project}/members', [ProjectMemberController::class, 'store'])
        ->name('projects.members.store');

    Route::delete('/projects/{project}/members/{user}', [ProjectMemberController::class, 'destroy'])
        ->name('projects.members.destroy');

    Route::get('/progress', [ProgressController::class, 'index'])
        ->name('progress.index');
});

/*
|--------------------------------------------------------------------------
| Project
|--------------------------------------------------------------------------
*/

Route::resource(
    'projects',
    ProjectController::class
);


/*
|--------------------------------------------------------------------------
| Task
|--------------------------------------------------------------------------
*/

Route::get(
    '/projects/{project}/tasks/create',
    [TaskController::class, 'create']
)->name('tasks.create');


Route::post(
    '/projects/{project}/tasks',
    [TaskController::class, 'store']
)->name('tasks.store');


Route::get(
    '/tasks/{task}/edit',
    [TaskController::class, 'edit']
)->name('tasks.edit');


Route::put(
    '/tasks/{task}',
    [TaskController::class, 'update']
)->name('tasks.update');


Route::delete(
    '/tasks/{task}',
    [TaskController::class, 'destroy']
)->name('tasks.destroy');