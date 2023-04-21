<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProjectController;
use App\Http\Livewire\Dashboard;
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
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/projects', cProject::class)->name('projects');
    //Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
    Route::get('/projects/{project}', [ProjectController::class, 'index'])->name('project');
    Route::get('/projects/{project}/workareas/{workarea}', [WorkpackageController::class, 'index'])->name('workapackage');
});
