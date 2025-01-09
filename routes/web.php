<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TaskManager;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthManager::class, 'login'])->name('login');
Route::post('login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('register', [AuthManager::class, 'register'])->name('register');
Route::post('register', [AuthManager::class, 'registerPost'])->name('register.post');

Route::middleware('auth')->group(function () {
    Route::get('task/list', [TaskManager::class, 'listTask'])->name('home');

    Route::get('task/add', [TaskManager::class, 'addTask'])->name('task.add');

    Route::post('task/add', [TaskManager::class, 'addTaskPost'])->name('task.add.post');

    Route::put('task/update/{id}', [TaskManager::class, 'updateTaskStatus'])->name('task.status.update');

    Route::delete('task/delete/{id}', [TaskManager::class, 'deleteTask'])->name('task.delete');
    Route::middleware('can:admin-actions')->group(function () {
        Route::get('admin/users', [AdminController::class, 'index'])->name('admin.users');
        Route::post('admin/users/{id}/block', [AdminController::class, 'blockUser'])->name('admin.users.block');
        Route::post('admin/users/{id}/unblock', [AdminController::class, 'unblockUser'])->name('admin.users.unblock');
    });
});
