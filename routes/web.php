<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;



//Route for the home page
Route::get('/', [homepageController::class,'home'])->name('home');

//Route for the sign up page
Route::get('/signup', [homepageController::class,'signup'])->name('signup');