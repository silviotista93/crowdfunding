<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*=============================================
        INICIALIZANDO LAS IMAGENES
        =============================================*/
       Storage::deleteDirectory('projects');
       Storage::deleteDirectory('users');

       Storage::makeDirectory('projects');
       Storage::makeDirectory('users');

        /*=============================================
         CREANDO LOS ROLES PARA LOS USUARIOS
         =============================================*/

       factory(\App\Role::class, 1)->create(['rol' => 'Admin']);
       factory(\App\Role::class, 1)->create(['rol' => 'Artist']);
       factory(\App\Role::class, 1)->create(['rol' => 'Backer']);
       factory(\App\Role::class, 1)->create(['rol' => 'Manage']);

        /*=============================================
        CREANDO LOS NIVELES PARA LOS ARTISTAS
        =============================================*/

        factory(\App\Level::class, 1)->create(['level' => 'Beginner']);
        factory(\App\Level::class, 1)->create(['level' => 'Intermediate']);
        factory(\App\Level::class, 1)->create(['level' => 'Professional']);

        /*=============================================
        CREANDO LAS CIUDADES PARA LOS PAISES
        =============================================*/

        factory(\App\City::class, 1)->create();
        factory(\App\City::class, 1)->create();
        factory(\App\City::class, 1)->create();
        factory(\App\City::class, 1)->create();
        factory(\App\City::class, 1)->create();

        /*=============================================
        CREANDO LOS PAISES
        =============================================*/

        factory(\App\Country::class, 1)->create();
        factory(\App\Country::class, 1)->create();
        factory(\App\Country::class, 1)->create();
        factory(\App\Country::class, 1)->create();
        factory(\App\Country::class, 1)->create();
        factory(\App\Country::class, 1)->create();

        /*=============================================
        CREANDO LAS CATEGORIAS ALETORIAS DE CADA PROYECTO
        =============================================*/
        factory(\App\Category::class, 10)->create();

        /*=============================================
        CREANDO UN USUARIO ADMINISTRADOR DEL SISTEMA
        =============================================*/

       factory(\App\User::class, 1)->create([
          'name' => 'admin',
           'email' => 'admin@gmail.com',
           'password' => bcrypt('secret')
       ])->each(function (\App\User $u){
          $u->roles()->attach(['1']);
       });

        /*=============================================
         CREANDO 50 USUARIOS POR DEFECTO Y LE ESTAMOS ASIGNANDO UN ARTISTA
        =============================================*/
        $artis = null;
       factory(\App\User::class, 50)->create()
           ->each(function (\App\User $u){
              factory(\App\Artist::class, 1)->create(['user_id' => $u->id]);
              $u->roles()->attach(['2','3']);
           });

        /*=============================================
          CREANDO 10 USUARIOS POR DEFECTO Y LE ESTAMOS ASIGNANDO UN MANAGEMENT
         =============================================*/

        factory(\App\User::class, 10)->create()
            ->each(function (\App\User $u){
                factory(\App\Management::class, 1)->create(['user_id' => $u->id])->each(function (\App\Management $m){
                    $categories= mt_rand(1,10);
                    $m->categories()->attach($categories);
                });
                $u->roles()->attach(['4']);
            });

        /*=============================================
         CREANDO 50 PROYECTOS POR DEFECTO Y LE ESTAMOS ASIGNANDO UN DONACIONES, REVIEWS, RECOMPENSAS
        =============================================*/

        factory(\App\Project::class,50)
            ->create()
            ->each(function (\App\Project $p){
                $p->donations()->saveMany(factory(\App\Donation::class, 10)->create());
                $p->reviews()->saveMany(factory(\App\Review::class, 6)->create());
                $p->rewards()->saveMany(factory(\App\Reward::class, 4)->create());
                $p->updates()->saveMany(factory(\App\Update::class, 4)->create());
                $artist= mt_rand(1,50);
                $manage = mt_rand(1,10);
                $p->artists()->attach($artist);
                $p->management()->attach($manage);
            });
    }
}
