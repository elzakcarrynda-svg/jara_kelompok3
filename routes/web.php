<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserManagementController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');


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

});


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';
