<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Project;
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
}
