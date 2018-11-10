<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function show(Category $category){
        $projects = $category->projects()->where('status',Project::PUBLISHED)->paginate(8);
        $categories = Category::select('*')->get();
        return view('frontend.projects.projects',compact('projects','categories'));
    }
}
