<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function memberDashboard()
    {
        return view('pages.dashboard.member', [
            'title' => 'Member Dashboard',
            'user' => auth()->user()
        ]);
    }

    public function adminDashboard()
    {
        return view('pages.dashboard.admin', [
            'title' => 'Admin Dashboard',
            'user' => auth()->user(),
            'totalUsers' => \App\Models\User::count(),
            'adminCount' => \App\Models\User::where('role', 'admin')->count(),
            'memberCount' => \App\Models\User::where('role', 'member')->count()
        ]);
    }
}
