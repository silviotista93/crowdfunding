<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    /**
     *Vista pagina de los proyectos
     */
    public function index()
    {
        $projects = Project::withCount(['artists'])
            ->with('category')
            ->where('status', Project::PUBLISHED)
            ->latest()
            ->paginate(8);
        $categories = Category::select('*')->get();
        return view('frontend.projects.projects', compact('categories', 'projects'));
    }


    public function show(Project $project)
    {
        $project->load([
            'category' => function ($q) {
                $q->select('id', 'category','slug');
            },
            'updates' => function ($q) {
                $q->select('*');
            },
            'artists.users',
            'reviews',
        ])->get();

        return view('frontend.projects.detail', compact('project'));
    }

    public function getByCategory(Request $request)
    {
        /*
        select projects.id,  sum(donations.amount)
        from projects inner join donations on projects.id = donations.project_id 
        where status = 4 and category_id = 1 group by projects.id
        */
        return Project::
        select(DB::raw('projects.*, SUM(donations.amount) as total'))->join('donations', 'projects.id', '=', 'donations.project_id')
            ->where('status', Project::PUBLISHED)->where('category_id', intval($request->input('id')))
            ->groupBy('projects.id')
            ->limit(6)->get();
    }
}
