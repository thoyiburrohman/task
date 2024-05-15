<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        $data = [
            'projects' => Project::all(),
            'task' => Task::all(),
            'taskSelesai' => Task::where('status', 'selesai')->get(),
            'projectProgress' => Project::where('status', 'sedang berlangsung')->get(),
            'projectComplete' => Project::where('status', 'selesai')->get(),
            'projectCancel' => Project::where('status', 'batal')->get(),
        ];
        return view('pages.index', $data);
    })->name('index');
    Route::get('archive', function () {
        $data = [
            'projects' => Project::where('status', 'complete')->get(),
            'tasks' => Task::where('status', 'complete')->get(),
        ];
        return view('pages.archive', $data);
    })->name('archive');


    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('user', UserController::class);
    Route::get('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::resource('task', TaskController::class);
    Route::get('task/{task}/delete', [TaskController::class, 'destroy'])->name('task.delete');
    Route::post('task/status/{task}', [TaskController::class, 'changeStatus'])->name('task.changeStatus');
    Route::resource('project', ProjectController::class)->except('destroy');
    Route::get('project/{project}/delete', [ProjectController::class, 'destroy'])->name('project.delete');
    Route::get('project/{project}/cancel', [ProjectController::class, 'cancel'])->name('project.cancel');
});
Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [AuthController::class, 'loginPage'])->name('login');
    Route::get('register', [AuthController::class, 'registerPage'])->name('register.page');
    Route::post('login', [AuthController::class, 'authentication'])->name('authentication');
    Route::post('register', [AuthController::class, 'store'])->name('register.user');
});
