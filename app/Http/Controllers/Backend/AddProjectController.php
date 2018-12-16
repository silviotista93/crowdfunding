<?php

namespace App\Http\Controllers\Backend;

use App\Artist;
use App\Category;
use App\Mail\NewProjectArtist;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AddProjectController extends Controller
{
    public function index (){
        $categories = Category::all();
        $artist_id = Artist::select('id')->where('user_id',auth()->user()->id)->first();
        $artist = Artist::select('nickname','biography','level_id','country_id')
            ->where('user_id', auth()->user()->id)->first();
        if ($artist->nickname == null){
            return redirect(route('profile.artist'))->with('eliminar','Para agregar un proyecto, completa tu perfil de artista');
        }else{
            return view('backend.projects.add-project',compact('categories','artist_id'));
        }
    }

    public function upload_image(Request $request){
        $image = $request->file('image')->store('projects');

        $url_go_input = Storage::url($image);
        $url = str_ireplace($request->root(),'',$url_go_input);

       return $url;
    }

    public function store (Request $request){
        $slug = str_slug($request->get('title'));
        $ramdoNum = mt_rand(1,10000);
        $project = Project::create([
            'title' => $request->get('title'),
            'short_description' => $request->get('short_description'),
            'project_picture' => $request->get('project_picture'),
            'iframe_video' => $request->get('iframe_video'),
            'category_id' => $request->get('category_id'),
            'status' => $request->get('status'),
            'price' => $request->get('price'),
            'slug' => $slug.'-'.$ramdoNum
        ]);

       $project->artists()->attach($request->get('artist_id'));
       $artist = Artist::select('nickname')->where('id',$request->get('artist_id'))->first();

       \Mail::to('silviotista93@gmail.com')->send(new NewProjectArtist($project,auth()->user()->name));
       alert()->success('Tu proyecto ha sido enviado','¡Muy bien!')->autoClose(3000);
        return back();
    }
}
