<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function show(Category $category){
        $projects = $projects = Project::select(DB::raw('projects.*, SUM(donations.amount) as total'))->withCount(['artists'])
            ->with('category')
            ->join('donations', 'projects.id', '=', 'donations.project_id')
            ->where('status',Project::PUBLISHED)
            ->where('category_id', $category->id)
            ->groupBy('projects.id')
            ->latest()
            ->paginate(8);
        $category_name = $category;
        $categories = Category::select('*')->get();
        return view('frontend.projects.projects',compact('projects','categories','category_name'));
    }
}
