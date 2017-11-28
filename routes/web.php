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
  //
});

Route::get('/home', 'HomeController@index')->name('home');

//CRUD Unités
Route::get('/unites/{id}', 'UniteController@show')->where('id', '[0-9]+');;
Route::get('/unites', 'UniteController@index')->name('unites');

//CRUD Ingrédients
Route::get('/ingredients', 'IngredientController@index')->name('ingredients');

//CRUD Utilisateurs
Route::get('/users/{id}', 'UserController@show')->name('showUsers');
Route::put('/users/{id}', 'UserController@update')->name('updateUsers');
Route::get('/users', 'UserController@index')->name('users');
