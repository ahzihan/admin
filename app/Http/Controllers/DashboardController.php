<?php

namespace App\Http\Controllers;

use App\Models\VisitorModel;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        Gate::authorize('access-dashboard');

        $userIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");

        VisitorModel::insert(['ip_address'=>$userIP,'visit_time'=>$timeDate]);

        return view('dashboard');
    }
}
