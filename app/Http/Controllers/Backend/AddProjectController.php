<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AddProjectController extends Controller
{
    public function index (){
        $categories = Category::all();
        return view('backend.projects.add-project',compact('categories'));
    }

    public function upload_image(Request $request){
        $image = $request->file('image')->store('prueba');

        $url_go_input = Storage::url($image);
        $url = str_ireplace($request->root(),'',$url_go_input);

       return $url;
    }
}
