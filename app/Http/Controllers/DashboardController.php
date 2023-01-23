<?php

namespace App\Http\Controllers;

use App\Models\Flow;
use App\Models\ThemeficArea;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
//        return User::with('roles')->get();
        $totalActiveUsers   = User::where('status', 1)->count('id');
        $totalAdmin   = User::role(['admin'])->count('id');
        $totalRapidFlow = Flow::count('id');
        $totalThemeficAreas = ThemeficArea::count('id');
        $totalRapidProUser  = User::role(['rapidpro','both'])->count('id');
        $totalRapidActiveUser = User::role(['rapidpro','both'])->where('status',1)->count('id');

        return view('dashboard.index', compact('totalActiveUsers','totalRapidFlow','totalAdmin', 'totalThemeficAreas', 'totalRapidProUser', 'totalRapidActiveUser'));
    }
}
