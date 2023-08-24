<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function manager_dashboard(){
        return view('pages.dashboard.manager.dashboard-page');
    }
    public function employee_dashboard(){
        return view('pages.dashboard.employee.dashboard-page');
    }
}
