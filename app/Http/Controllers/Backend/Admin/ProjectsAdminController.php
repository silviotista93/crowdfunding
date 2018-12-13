<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Management;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsAdminController extends Controller
{
    public function index(){

        return view('backend.admin.projects-admin');
    }

    public function table_projects(){

        return datatables()->of(Project::with([
            'artists',
            'category'
        ]))->toJson();
    }
    public function table_managements(){

        return datatables()->of(Management::with('users','categories'))->toJson();
    }
    public function send_project_management(Request $request){

    }
}
