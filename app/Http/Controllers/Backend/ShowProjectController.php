<?php

namespace App\Http\Controllers\Backend;

use App\Artist;
use App\Country;
use App\EndProject;
use App\Location;
use App\Management;
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
        $artist= Project::where('id',$project->id)->with('artists.users')->first();
        $country = Country::where('id',$artist->artists[0]->country_id)->first();
        $location = Location::where('id',$artist->artists[0]->location_id)->first();
        if (in_array('Admin', $rol) || in_array('Manage', $rol)) {
            return view('backend.projects.show-project', compact('project','end_time','artist','country','location'));
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
                return view('backend.projects.show-project', compact('project','end_time','artist','country','location'));
            } else {
                return response('No puedes continuar', 404);
            }
        }
    }

    public function table_assing_management(Request $request){
        $project = Management::whereHas('projects', function ($query) use ($request){
            $query->where('projects.id', '=', $request->get('id_project'));
        })->with('users')->get();
        return datatables()->of($project)->toJson();

    }

}
