<?php

namespace App\Http\Controllers\Backend;

use App\Artist;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){

        //ULTIMO PROYECTOS SEGUN SU ESTADO
        $last_approved = Project::where('status',Project::APPROVAL)->with('artists')->take(2)->get();
        $last_published = Project::where('status',Project::PUBLISHED)->with('artists')->take(2)->get();
        $last_rejected = Project::where('status',Project::REJECTED)->with('artists')->take(2)->get();
        $last_revisions = Project::where('status',Project::REVISION)->with('artists')->take(2)->get();
        $last_pre_approved = Project::where('status',Project::PREAPPROVAL)->with('artists')->take(2)->get();

        //ULTIMOS ARTISTAS REGISTRADOS
        $last_artists = Artist::with('users','location','countries')->get();

        return view('backend.dashboard.dashboard',compact(
            'last_published','last_rejected','last_approved',
            'last_revisions','last_pre_approved','last_artists'));
    }
}
