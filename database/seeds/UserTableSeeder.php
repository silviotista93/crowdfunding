<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        $admin = User::create([

            'name'=>'Mauricio',
            'last_name'=>'Gutierrez',
            'picture'=>'/public/backend/assets/app/media/img/users/perfil.jpg',
            'phone_1'=>'333333333',
            'phone_2'=>'333333333',
            'state'=>'1',
            'slug'=>'mauricio-gutierrez',
            'email'=>'silviotista@gmail.com',
            'password'=>bcrypt('secret')

        ]);

        $admin->roles()->attach(1);

        $manage = User::create([

            'name'=>'Omar',
            'last_name'=>'Sanchez',
            'picture'=>'/public/backend/assets/app/media/img/users/perfil.jpg',
            'phone_1'=>'333333333',
            'phone_2'=>'333333333',
            'state'=>'1',
            'slug'=>'omar-sanchez',
            'email'=>'odsanchez@gmail.com',
            'password'=>bcrypt('secret')

        ]);

        $manage->roles()->attach(2);
        

        $artist = User::create([

            'name'=>'Cristian',
            'last_name'=>'Salazar',
            'picture'=>'/public/backend/assets/app/media/img/users/perfil.jpg',
            'phone_1'=>'333333333',
            'phone_2'=>'333333333',
            'state'=>'1',
            'slug'=>'cristian-salazar',
            'email'=>'casalazar@gmail.com',
            'password'=>bcrypt('secret')

        ]);

        $artist->roles()->attach(3);
    }
}
