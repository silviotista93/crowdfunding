<?php

namespace App\Http\Controllers\Backend;

use App\Artist;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyProjectsController extends Controller
{
    public function index_artist(){

        $artist = Artist::where('user_id',auth()->user()->id)->with('users','countries','projects')->first();

        return view('backend.profile.my-projects',compact('artist'));
    }
}
