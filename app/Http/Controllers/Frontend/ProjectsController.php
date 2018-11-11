<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    /**
     *Vista pagina de los proyectos
     */
    public function index(){
        $projects = Project::withCount(['artists'])
            ->with('category')
            ->where('status',Project::PUBLISHED)
            ->latest()
            ->paginate(8);
        $categories = Category::select('*')->get();
        return view('frontend.projects.projects',compact('categories','projects'));
    }

    public function show (Project $project){
        $project->load([
            'category' => function($q) {
                $q->select('id','category');
            },
            'updates' => function($q){
                $q->select('*');
            },
            'reviews'
        ])->get();
        return view('frontend.projects.detail',compact('project'));
    }
}
