<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
     public function index()
    {
        return Inertia::render('Auth/Profile'); // Vue: resources/js/Pages/Auth/Profile.vue
    }
}
