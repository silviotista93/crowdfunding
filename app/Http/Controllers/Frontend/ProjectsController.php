<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class ProjectsController extends Controller
{
    /**
     *Vista pagina de los proyectos
     */

    public function index(){
        $projects = \App\Project::
        where('status',Project::PUBLISHED)
        ->with("category","artists",'artists.users', 'donations')->latest()->paginate(8);
        $projects->setCollection( \App\Project::card($projects->getCollection()) );

        $user = User::first();
        $categories = Category::select('*')->get();
        return view('frontend.projects.projects', compact('categories', 'projects','user'));
    }


    public function show(Project $project){

        $project->load([
            'category' => function ($q) {
                $q->select('id', 'category','slug');
            },
            'updates' => function ($q) {
                $q->select('*');
            },
            'artists.users',
            'reviews.users',
            'rewards',
            'images'
        ])->get();
        $project->informacionDonations = Project::select(DB::raw('SUM(donations.amount) as totalDonations, count(donations.user_id) as totalDonors'))
                        ->where("projects.id", "=", $project->id)
                        ->join('donations', 'projects.id', '=', 'donations.project_id')
                        ->first();

        return view('frontend.projects.detail', compact('project'));
    }


    public function getByCategory(Request $request){
        $projects = Project::where('status',Project::PUBLISHED)
        ->where('category_id', intval($request->input('id')))
        ->with('category','artists', 'artists.users')
        ->latest()
        ->limit(6)->get();

        $projects = Project::card($projects);

        return json_encode($projects);
    }

/*proyecto por artista*/ 
    public function projectArtist($id){

        $artist = \App\Artist::where("user_id","=",$id)
        ->with([
            'users',
            'countries'
        ])->first();

        $projects = \App\Project::
        where('status',Project::PUBLISHED)
        ->whereHas('artists', function ($query) use ($id) {
            $query->where('user_id', '=', $id);
        })
        ->with("category", 'donations')->latest()->paginate(8);
        
        $data = $projects->getCollection();
        
        $data = \App\Project::card($data, $artist);
        
        $projects->setCollection($data);
            


        return view('frontend.projects.projectsByArtist', compact('projects','artist'));
    }



}
