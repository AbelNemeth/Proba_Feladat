<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EditController;

Route::get('/', [ProjectController::class, 'index'])->name('home.index');
Route::get('/edit', [EditController::class, 'index'])->name('edit.index');

Route::get('/editProject', [ProjectController::class, 'edit'])->name('edit.project');

Route::resource('projects', ProjectController::class);
Route::post('/addProject', [ProjectController::class, 'create'])->name('projects.add');
Route::post('/updateProject', [ProjectController::class, 'update'])->name('project.update');

Route::post('/addContact', [ContactController::class, 'create'])->name('contacts.add');
