<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TodoController;


//Route for the home page
Route::get('/', [homepageController::class,'home'])->name('home');

//Route for the sign up page
Route::get('/signup', [homepageController::class,'signup'])->name('signup');

//Route for the todo page
Route::get('/dashboard/todo', [TodoController::class, 'todo'])->name('dashboard.todo');


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

//Change status
Route::get('/todo/{todo}/update/{status}', [TodoController::class, 'updateStatus'])->name('todo.status');
