<?php

namespace App\Http\Controllers\Backend\Manage;

use App\Management;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProjectsManageController extends Controller
{
    public function index(){
        return view('backend.management.projects_manage');
    }

    public function table_projects(Request $request){

        $management = Management::select('id')->where('user_id',auth()->user()->id)->first();

        $manage_project = DB::table('management_project')
            ->select('project_id')->where('management_id',$management->id)
            ->get();
        $array_project = [];

        for ($i=0; $i<count($manage_project); $i++) {
            $project = \App\Project::where('id', $manage_project[$i]->project_id)->with('artists','category')->get();
            array_push($array_project,$project);
        }

        if ($request->input("tipoProyecto")){
            $array_project->where('status', "=", $request->input("tipoProyecto"));
        }
     return datatables()->of($array_project)->toJson();
    }
}
