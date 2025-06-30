<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function memberDashboard()
    {
        return view('dashboard.member', ['title' => 'Member Dashboard']);
    }

    public function adminDashboard()
    {
        return view('dashboard.admin', ['title' => 'Admin Dashboard']);
    }
}
