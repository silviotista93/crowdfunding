<?php

namespace App\Http\Controllers\Backend;

use App\Artist;
use App\Country;
use App\Level;
use App\Update;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index_artist(){
        $countries = Country::all();
        $levels = Level::all();
        $artist = Artist::where('user_id',auth()->user()->id)->with('users.socialAcounts','countries')->first();
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

    public function update_password(Request $request, User $user){

        if ($request->filled('password')) {

            $this->validate($request, [

                'password' => 'confirmed|min:6',

            ]);
            $password = $request->get('password');
            $user->password = bcrypt($password);

            $user->update();

            alert()->success('Contraseña Actualizada','¡Muy bien!')->autoClose(3000);
            return back();
        } else {


            return back()->with('eliminar','Ningún Cambio');
        }
    }
    public function photo (Request $request){
        $user = User::where('id',auth()->user()->id)->first();
        $user_picture =  str_replace('storage','',$user->picture);;
        //Elimnar foto de perfil del servidor
        Storage::delete($user_picture);
        //Agregar la nueva foto de perfil
        $photo = $request->file('photo')->store('users');
        User::where('id',auth()->user()->id)->update([
            'picture' => '/storage/'.$photo
        ]);

        return $user_picture;

    }
}
