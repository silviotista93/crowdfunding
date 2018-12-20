<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*=============================================
CONSULTAS DE PRUEBAS
=============================================*/
Route::get('email',function (){
    $project = \App\Project::where('id',65)->first();

    return new \App\Mail\NewProjectArtist($project,'admin');
});
Route::get('fecha',function (){
    $date = date('Y-m-d H:i:s');
   $semana2 = date("Y-m-d H:i:s",strtotime($date."+ 2 week"));
    echo  $semana2;
});
Route::get('/count/{id}',function ($id){
    $hola = \App\Management::select('id')->where('user_id',$id)->first();
     dd($hola->id);
});
Route::get('/projects-sql',function (){
    $project = \App\Project::where('id', 42)->with('artists')->first();
    dd($project->artists[0]->id);
});
Route::get('/artists/{id}',function ($id){
    return \App\Artist::where('id',$id)->with(['projects','levels','countries'])->get();
});
Route::get('/managements','Backend\ShowProjectController@table_assing_management');
/*=============================================
SELECCIONAR IDIOMAS
=============================================*/
Route::get('/set_language/{lang}','Controller@setLanguage')->name('set_language');

/*=============================================
FRONTEND
=============================================*/
Route::group(['namespace'=>'Frontend'],function (){
    //Rutas para el modulo HOME
    Route::get('/','HomeController@index')->name('home');

    //Rutas para el modulo PROJECTS
    Route::get('/projects','ProjectsController@index')->name('projects');

    Route::get('/projects/{project}','ProjectsController@show')->name('projects.show');

    Route::get('/projects-for-category','ProjectsController@getByCategory');


    //Rutas para las Categorias
    Route::get('/projects/category/{category}','CategoriesController@show')->name('categories.show');
});

/*=============================================
BACKEND
=============================================*/
Route::group(['namespace'=>'Backend','prefix' => 'dashboard','middleware' => 'auth'],function (){
    //Rutas para el modulo Dashboard
    Route::get('/','DashboardController@index')->name('dashboard');

    //RUTAS PARA EL PERFIL
    //Perfil Artista
    Route::get('/profile','ProfileController@index_artist')->name('profile.artist');
    Route::post('/profile-photo-artist','ProfileController@photo')->name('profile.photo.artist');
    Route::put('/update-profile-artist/{id_artis}','ProfileController@profile_update_artist')->name('update.profile.artist');
    Route::put('update-password-artist/{user}','ProfileController@update_password')->name('update.password.artist');
    //Proyectos del Artista
    Route::get('/my-projects','MyProjectsController@index_artist')->name('myprojects.artist');
    //Apoyos hechos
    Route::get('/backings-made','BackingsMadeController@index_artist')->name('backings.made.artist');

    //RUTAS PARA AGREGAR PROYECTOS
    Route::get('/new-project','AddProjectController@index')->name('add.project');
    Route::post('/add-project-imagen','AddProjectController@upload_image')->name('add.project.image');
    Route::post('/add-project','AddProjectController@store')->name('add.store.project');

    //RUTAS PARA VER EL PROJECT
    Route::get('/project/{project}','ShowProjectController@index')->name('show.backend.project');


    //RUTAS PARA EL ADMINISTRADOR DEL SISTEMA -------------------------------------------------------------------------------------------

    //Todos los proyectos....

    Route::group(['middleware' => 'admin_permisos'],function (){
        Route::get('/projects-admin', 'Admin\ProjectsAdminController@index')->name('projects.admin');
        Route::get('datatables-projects-admin','Admin\ProjectsAdminController@table_projects')->name('datatables.projects.admin');
        Route::get('datatables-managements-admin','Admin\ProjectsAdminController@table_managements')->name('datatables.management.admin');
    });

    //RUTAS PARA EL MANAGEMENT -------------------------------------------------------------------------------------------
    Route::group(['middleware' => 'manage_permisos'],function (){
        Route::get('/projects-manage', 'Manage\ProjectsManageController@index')->name('projects.manage');
        Route::get('datatables-projects-manage','Manage\ProjectsManageController@table_projects')->name('datatables.projects.manage');
    });


    
    //Enviar Mensajes a managers
    Route::post("send-project-management", "Admin\ProjectsAdminController@send_project_management")->name("send.project.admin");

});

/*=============================================
RUTAS PARA LOGIN REDES SOCIALES
=============================================*/
Route::get('login/{driver}','Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback','Auth\LoginController@handleProviderCallback');
/*=============================================
AUTH RUTAS DE SEGURIDAD
=============================================*/
Auth::routes();

Route::get('/images/{path}/{attachment}', function ($path, $attachment){
    $file = sprintf('storage/%s/%s',$path,$attachment);
    if (File::exists($file)){
        return \Intervention\Image\Facades\Image::make($file)->response();
    }
});
