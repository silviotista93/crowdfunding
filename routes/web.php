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
Route::get('/count/{id}',function ($id){
    return \App\Project::where([['category_id',$id],['status',\App\Project::PUBLISHED]])
        ->count('id');
});

Route::get('/projects',function (){
   return \App\Project::withCount(['artists'])
       ->with('category','artists')
       ->where('status',\App\Project::PUBLISHED)
       ->latest()
       ->get();
});
Route::get('/artists',function (){
    return \App\Artist::with(['projects','levels','countries'])->get();
});
Route::get('/managaments',function (){
   return \App\Management::with(['projects','categories'])->get();
});
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
    Route::get('/projects/{project}','ProjectsController@show')->name('projects.show ');
    //Rutas para las Categorias
    Route::get('/projects/category/{category}','CategoriesController@show')->name('categories.show');
});

/*=============================================
BACKEND
=============================================*/
Route::group(['namespace'=>'Backend','prefix' => 'dashboard','middleware' => 'auth'],function (){
    //Rutas para el modulo Dashboard
    Route::get('/','DashboardController@index')->name('dashboard');
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
