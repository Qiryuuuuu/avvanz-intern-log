<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homepageController extends Controller
{
    public function home() {
        return view("auth.login");
    }

    public function signup() {
        return view("auth.register");
    }


}
