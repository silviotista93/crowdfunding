<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $projects = Project::withCount(['artists'])
            ->with('category')
            ->where('status',Project::PUBLISHED)
            ->latest()
            ->get();
        $categories = Category::select('category', 'id')->get();
        $projects_slider = Project::with('artists')->take(3)->get();

        return view('frontend.home.home',compact('categories','projects','projects_slider'));
    }

    public function nosotros(){
        return view('frontend.nosotros.nosotros');
    }

    public function artist(){
        return view('frontend.artist.artist');
    }

    public function backer(){
        return view('frontend.backer.backer');
    }
}
