<?php

namespace App\Http\Controllers\Backend;

use App\Artist;
use App\Country;
use App\Level;
use App\Update;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index_artist(){
        $countries = Country::all();
        $levels = Level::all();
        $artist = Artist::where('user_id',auth()->user()->id)->with('users','countries')->first();
        return view('backend.profile.profile-artist',compact('countries','levels','artist'));
    }

    public function profile_update_artist(Request $request, $id_artis){
        //Actualizar en la tabla Artist

        //Validaciones
        $this->validate($request,[
            'nickname' => 'required',
            'biography' => 'required',
            'level_id' => 'required',
            'country_id' => 'required',
            'phone_1' => 'required',
        ]);

        Artist::where('user_id','=',$id_artis)->update([
            'nickname' => $request->get('nickname'),
            'biography' => $request->get('biography'),
            'level_id' => $request->get('level_id'),
            'country_id' => $request->get('country_id'),
            'facebook' => $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            'youtube' => $request->get('youtube'),
        ]);

        User::where('id','=',$id_artis)->update([
            'phone_1' => $request->get('phone_1'),
            'phone_2' => $request->get('phone_2'),
        ]);
        alert()->success('Tu perfil ha sido actualizado','¡Muy bien!')->autoClose(3000);
        return back();
    }
}
