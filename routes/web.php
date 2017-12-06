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

Route::get('/', function () {
    return view('welcome');
})->name('root');

Auth::routes();

//authentificated routes
Route::middleware(['auth'])->group(function () {

  Route::resource('ingredients', 'IngredientController');

  Route::resource('recettes', 'RecetteController');
  Route::get('planning', 'RecetteController@my_planning')->name('recettes.planning');

  //admin routes
  Route::middleware(['admin'])->group(function () {

    Route::resource('users', 'UserController');

  });
});

// Route::get('/home', 'HomeController@index')->name('home');

//CRUD Unités
// Route::get('/unites/{id}', 'UniteController@show')->where('id', '[0-9]+');;
// Route::get('/unites', 'UniteController@index')->name('unites');
