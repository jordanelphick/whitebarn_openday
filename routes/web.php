<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WorkareaController;

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\cProjects;
use App\Http\Livewire\cProject;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', cProjects::class)->name('dashboard');
    Route::get('/projects', cProjects::class)->name('projects');
    //Route::get('/projects/{project}', [ProjectController::class, 'index'])->name('project');
    Route::get('/projects/{projectNumber}', cProject::class)->name('project');
    /*Route::get('/projects/{project}', function($project){
        dd($project);
    })->name('project');*/
    Route::get('/projects/{project}/{workarea}', [WorkareaController::class, 'index'])->name('workarea');
});
