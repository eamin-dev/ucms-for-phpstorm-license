<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $totalActiveUsers= User::where('status',1)->count('id');
        return view('dashboard.index',compact('totalActiveUsers'));
    }
}
