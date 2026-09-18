<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectMemberController;
use App\Http\Controllers\ProgressController;


Route::view('/', 'welcome');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/users',
            [UserManagementController::class, 'index']
        )->name('users.index');


        Route::get('/users/create',
            [UserManagementController::class, 'create']
        )->name('users.create');


        Route::post('/users',
            [UserManagementController::class, 'store']
        )->name('users.store');


        Route::delete('/users/{user}',
            [UserManagementController::class, 'destroy']
        )->name('users.destroy');

    });



/*
|--------------------------------------------------------------------------
| Application
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    // Project CRUD
    Route::resource(
        'projects',
        ProjectController::class
    );


    // Task CRUD
    Route::resource(
        'projects.tasks',
        TaskController::class
    )->except(['show']);



    // Collaboration

    Route::get(
        '/projects/{project}/members',
        [ProjectMemberController::class, 'index']
    )->name('projects.members.index');


    Route::post(
        '/projects/{project}/members',
        [ProjectMemberController::class, 'store']
    )->name('projects.members.store');


    Route::delete(
        '/projects/{project}/members/{user}',
        [ProjectMemberController::class, 'destroy']
    )->name('projects.members.destroy');



    // Progress

    Route::get(
        '/progress',
        [ProgressController::class, 'index']
    )->name('progress.index');

});


require __DIR__.'/auth.php';