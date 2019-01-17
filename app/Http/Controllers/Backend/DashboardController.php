<?php

namespace App\Http\Controllers\Backend;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $last_revision = Project::where('status',Project::APPROVAL)->with('artists')->get();
        return view('backend.dashboard.dashboard',compact('last_revision'));
    }
}
