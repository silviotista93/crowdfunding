<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Artist;
use App\EndProject;
use App\Mail\AssignProjectManager;
use App\Mail\NewProjectArtist;
use App\Management;
use App\Project;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProjectsAdminController extends Controller
{
    public function index(){

        return view('backend.admin.projects-admin');
    }

    public function table_projects(Request $request){
        $project = Project::with([
            'artists',
            'category'
        ]);
        if ($request->input("tipoProyecto")){
            $project->where('status', "=", $request->input("tipoProyecto"));
        }
        return datatables()->of($project)->toJson();
    }
    public function table_managements(){
        return datatables()->of(Management::with('users','categories')->get())->toJson();
    }
    public function send_project_management(Request $request){
        //En la consola de el navegador se visualizan los datos que se envian
        $data = $request->input("users");
        $dateNow = date('Y-m-d');
        $week = date("Y-m-d",strtotime($dateNow."+ 2 week"));
        $project = Project::where('id', $request->input('project'))->with('artists')->first();
        $end_time = EndProject::select('end_time')->where('project_id',$project->id)->first();
        $img_artist = User::where('id',$project->artists[0]->user_id)->first();
        $artist= Artist::where('user_id',$img_artist->id)->first();
        foreach ($data as $key => $user){
            //echo $user['email']."  ".$project->artists[0]->nickname."\n";
            $management = Management::where('user_id',$user['id'])->first();
            \Mail::to($user['email'])->send(new AssignProjectManager($project,$project->artists[0]->nickname,$end_time,$img_artist));
            $project->management()->attach($management['id']);

            $reviews = Review::create([
               'project_id' => $project->id,
                'user_id' => $user['id'],
                'end_time' => $week
            ]);
        }
        $end_project = EndProject::insert(['project_id' => $project->id,'end_time' => $week]);

        $statusProject = Project::where('id', $request->input('project'))->update(array('status' => 2));
        return '{"status":"200", "msg":"Mensaje enviado correctamente."}';
    }
}
