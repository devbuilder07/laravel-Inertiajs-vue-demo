<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function create()
    {
        return Inertia::render('frontend/auth/login');
    }

    public function store()
    {
        // body
    }

    public function destroy()
    {
        // body
    }
}
