<?php

use Illuminate\Support\Facades\Route;


use App\Http\Livewire\cDashboard;
use App\Http\Livewire\cPrivileges;
use App\Http\Livewire\cDesignITP;
use App\Http\Livewire\cProjects;
use App\Http\Livewire\cWorkarea;
use App\Http\Livewire\cWorkpackage;
use App\Http\Livewire\cProjectRFIs;
use App\Http\Livewire\ProjectWorkareas;
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

    Route::get('/privileges', cPrivileges::class)->name('privileges');
    Route::get('/projects', cProjects::class)->name('projects');

    //Route::get('/projects/{project}', [ProjectController::class, 'index'])->name('project');
    Route::get('/{projectNumber}/dashboard', cDashboard::class)->name('dashboard');
    Route::get('/{projectNumber}/design-itp', cDesignITP::class)->name('design-itp');
    //Route::get('/projects/{project}/{workarea}', [WorkareaController::class, 'index'])->name('workarea');
    Route::get('/projects/{projectNumber}/{workareaName}', cWorkarea::class)->name('workarea');

    Route::get('/projects/{projectNumber}/RFIs', cProjectRFIs::class)->name('project.rfis');

    Route::get('/projects/{projectNumber}/{workareaName}/{workpackageName}', cWorkpackage::class)->name('workpackage');



    Route::get('/projects2/{project}', ProjectWorkareas::class)->name('projects.workareas');
});
