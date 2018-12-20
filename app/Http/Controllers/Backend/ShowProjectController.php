<?php

namespace App\Http\Controllers\Backend;

use App\Artist;
use App\EndProject;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShowProjectController extends Controller
{
    public function index(Project $project)
    {

        $users = User::where('id', \Auth::user()->id)->with(['roles'])->first();
        $rol = array_pluck($users->roles, 'rol');
        $end_time = EndProject::where('project_id',$project->id)->first();

        if (in_array('Admin', $rol) || in_array('Manage', $rol)) {
            return view('backend.projects.show-project', compact('project','end_time'));
        }else {

            $verify = Artist::where('user_id', auth()->user()->id)->with([
                'projects' => function ($q) {
                    $q->select('slug');
                },
            ])->first();

            $seacharSlug = $project->slug;
            $projectsSlug = json_decode($verify->projects);
            $array = array_pluck($projectsSlug, 'slug');
            $project->first();

            if (in_array($seacharSlug, $array)) {
                return view('backend.projects.show-project', compact('project','end_time'));
            } else {
                return response('No puedes continuar', 404);
            }
        }
    }
}
