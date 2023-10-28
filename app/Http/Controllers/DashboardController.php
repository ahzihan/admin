<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Gate;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        // Gate::authorize('access-dashboard');
        return view('dashboard');
    }
}
