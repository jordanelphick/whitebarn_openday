<?php

use Illuminate\Support\Facades\Route;


use App\Http\Livewire\cLogin;
use App\Http\Livewire\cHiddenDashboard;

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

Route::get('/', cLogin::class)->name('login');


Route::get('/hidden-dashboard', cHiddenDashboard::class)->name('hidden-dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

});
