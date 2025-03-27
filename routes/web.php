<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\NotebookController;


//Route for the home page
Route::get('/', [homepageController::class,'home'])->name('home');

//Route for the sign up page
Route::get('/signup', [homepageController::class,'signup'])->name('signup');

//Todo route
//Insert data route
Route::get('/account-creation', [homepageController::class,'accountCreation'])->name('accountCreation');

//Index todo dashboard
Route::get('/todo', [TodoController::class, 'todo'])->name('todo.index');

//Create route
Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');

//Store route
Route::post('/todo/store', [TodoController::class, 'store'])->name('todo.store');

//Edit screen route
Route::get('/todo/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');

//Edit method
Route::put('/todo/{todo}/update', [TodoController::class, 'update'])->name('todo.update');

//Delete method
Route::delete('/todo/{todo}/delete', [TodoController::class, 'delete'])->name('todo.delete');


// Todo - Change status
Route::get('/todo/{todo}/update/{status}', [TodoController::class, 'updateStatus'])->name('todo.status');


//Notebook route
//Index notebook dashboard
Route::get('/notebook', [NotebookController::class, 'nbIndex'])->name('notebook.index');

//Create view route
Route::get('/notebook/create', [NotebookController::class, 'nbCreate'])->name('notebook.create');

//Store method
Route::post('/notebook/store', [NotebookController::class, 'nbStore'])->name('notebook.store');

//Edit screen
Route::get('/notebook/{note}/edit', [NotebookController::class, 'nbEdit'])->name('notebook.edit');

//Update method
Route::put('/notebook/{note}/update', [NotebookController::class, 'nbUpdate'])->name('notebook.update');

//Delete method
Route::delete('/notebook/{note}/delete', [NotebookController::class, 'nbDelete'])->name('notebook.delete');

//Show method
Route::get('/notebook/{note}/show', [NotebookController::class, 'nbShow'])->name('notebook.show');
