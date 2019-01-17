<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    /**
     *
     */
    public function last_projects(){

        $last_revision = Project::where('status',Project::REVISION)->with('users','');
    }
}
