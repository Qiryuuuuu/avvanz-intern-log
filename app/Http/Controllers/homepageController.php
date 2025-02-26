<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homepageController extends Controller
{
    public function home() {
        return view("home");
    }

    public function signup() {
        return view("signup");
    }
}
