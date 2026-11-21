<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Task;
use App\Models\User;

// Dashboard Route

Route::get('/', function () {
    $tasksCount = Task::count();
    $usersCount = User::count();

    return view('dashboard.index', compact('tasksCount', 'usersCount'));
})->name('dashboard');

// Tasks Routes

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Users Routes

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
