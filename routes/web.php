<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomLoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/', [CustomLoginController::class, 'login']);
Route::get('/user-register', [CustomLoginController::class, 'register']);
Route::post('/custom-login', [CustomLoginController::class, 'loginUser'])->name('custom.login');

Route::middleware('adminGroup')->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [App\Http\Controllers\Admin\DashboardController::class, 'logout'])->name('adminLogout');
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('userIndex');
    Route::match(['get', 'post'], '/add-edit-user/{id?}', action: [App\Http\Controllers\Admin\UserController::class, 'addEditUser'])->name('addEditUser');
    Route::get('/user-destroy/{id}', [App\Http\Controllers\Admin\UserController::class, 'userDestroy'])->name('userDestroy');
    // task routes
    Route::get('/tasks', [App\Http\Controllers\Admin\TaskController::class, 'index'])->name('taskIndex');
    Route::match(['get', 'post'], '/add-edit-tasks/{id?}', action: [App\Http\Controllers\Admin\TaskController::class, 'addEditTask'])->name('addEditTask');
    Route::get('/tasks-destroy/{id}', [App\Http\Controllers\Admin\TaskController::class, 'taskDestroy'])->name('taskDestroy');
    Route::post('/task-status-update/{id}', [App\Http\Controllers\Admin\TaskController::class, 'updateStatus'])->name('taskStatusUpdate');


});

Route::middleware('userGroup')->prefix('user')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/logout', [App\Http\Controllers\User\UserDashboardController::class, 'logout'])->name('user.logout');
    Route::get('/task', [App\Http\Controllers\User\UserTaskController::class, 'index'])->name('user.task');
    Route::post('/task-status-update/{id}', [App\Http\Controllers\User\UserTaskController::class, 'userTaskStatusUpdate'])->name('userTaskStatusUpdate');
});