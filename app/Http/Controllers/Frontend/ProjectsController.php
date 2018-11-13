<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    /**
     *Vista pagina de los proyectos
     */

    public function index(){
        $projects = Project::select(DB::raw('projects.*, SUM(donations.amount) as total'))->withCount(['artists'])
            ->with('category','artists')
            ->join('donations', 'projects.id', '=', 'donations.project_id')
            ->where('status',Project::PUBLISHED)
            ->groupBy('projects.id')
            ->latest()
            ->paginate(8);
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
            'rewards'
        ])->get();

        return view('frontend.projects.detail', compact('project'));
    }


    public function getByCategory(Request $request){

        return Project::
        select(DB::raw('projects.*, SUM(donations.amount) as total'))->join('donations', 'projects.id', '=', 'donations.project_id')
            ->where('status', Project::PUBLISHED)->where('category_id', intval($request->input('id')))
            ->groupBy('projects.id')
            ->limit(6)->get();
    }
}
