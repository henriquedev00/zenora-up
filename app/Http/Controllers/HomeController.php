<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class HomeController extends Controller
{
    public function index(): InertiaResponse
    {
        return Inertia::render('Home');
    }

    public function indexOld(): InertiaResponse
    {
        return Inertia::render('HomeOld');
    }
}
