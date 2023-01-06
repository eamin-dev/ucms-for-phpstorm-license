<?php

namespace App\Http\Controllers;

use App\Models\ThemeficArea;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
//        return User::with('roles')->get();
        $totalActiveUsers   = User::where('status', 1)->count('id');
        $totalThemeficAreas = ThemeficArea::count('id');
        $totalRapidProUser  = User::where('platform', 1)->count('id');
        $totalRapidActiveUser = User::where('platform', 1)->where('status',1)->count('id');

        return view('dashboard.index', compact('totalActiveUsers', 'totalThemeficAreas', 'totalRapidProUser', 'totalRapidActiveUser'));
    }
}
