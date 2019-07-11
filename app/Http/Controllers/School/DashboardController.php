<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Shows the Dashboard for the user
     */
    public function index()
    {
        return view('school.dashboard');
    }
}
