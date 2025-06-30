<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // DashboardController.php
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return view('pages.dashboard.admin');
        }
        return view('pages.dashboard.member');
    }
}
