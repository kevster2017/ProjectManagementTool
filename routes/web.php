<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;

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
    return view('home');
});

Auth::routes();

Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->middleware('auth');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/internal', [ProjectController::class, 'internalIndex'])->name('projects.internalIndex');
Route::get('/projects/external', [ProjectController::class, 'externalIndex'])->name('projects.externalIndex');
Route::get('/projects/pipeline', [ProjectController::class, 'pipelineIndex'])->name('projects.pipelineIndex');
Route::get('/projects/archived', [ProjectController::class, 'archivedIndex'])->name('projects.archivedIndex');
Route::get('/projects/myProjects', [ProjectController::class, 'myIndex'])->name('projects.myIndex');

Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store')->middleware('auth');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create')->middleware('auth');
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit')->middleware('auth');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update')->middleware('auth');
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy')->middleware('auth');

/* Document Routes */
Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');

Route::get('/documents/{id}', [DocumentController::class, 'download'])->name('documents.download');

Route::post('/documents/store', [DocumentController::class, 'store'])->name('documents.store')->middleware('auth');


Route::delete('/documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy')->middleware('auth');
