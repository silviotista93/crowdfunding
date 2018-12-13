<?php

namespace App\Http\Controllers\Backend;

use App\Artist;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowProjectController extends Controller
{
    public function index(Project $project)
    {

        $users = User::where('id', \Auth::user()->id)->with(['roles'])->first();
        $rol = array_pluck($users->roles, 'rol');
        if (in_array('Admin', $rol)) {
            return view('backend.projects.show-project', compact('project'));
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
                return view('backend.projects.show-project', compact('project'));
            } else {
                return response('No puedes continuar', 404);
            }
        }
    }
}
