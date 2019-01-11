<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'rol'=>'Admin',
            'description'=>'rol del administrador tiene todos los permisos'
        ]);

        Role::create([
            'rol'=>'management',
            'description'=>'rol de patrocinador '
        ]);

        Role::create([
            'rol'=>'artist',
            'description'=>'rol del artista '
        ]);


    }
}
