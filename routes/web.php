<?php

// Les routes pour se connecter, s'inscrire, mot de passe perdu, ...
Auth::routes();

// La page d'accueil
Route::get('/', 'HomeController@index')->name('root');


Route::get('/recettes', 'RecetteController@index')->name('recettes.index');
Route::get('/recettes/{id}', 'RecetteController@show')->name('recettes.show');


//authentificated routes
Route::middleware(['auth'])->group(function () {

  // Routes pour les recettes
  Route::post('/recettes', 'RecetteController@store')->name('recettes.store');
  Route::get('/recettes/create', 'RecetteController@create')->name('recettes.create');
  Route::put('/recettes/{id}', 'RecetteController@update')->name('recettes.update');
  Route::delete('/recettes/{id}', 'RecetteController@destroy')->name('recettes.destroy');
  Route::get('/recettes/{id}/edit', 'RecetteController@edit')->name('recettes.edit');

  Route::resource('ingredients', 'IngredientController');

  Route::post('planning/{id}/attach', 'RecetteController@attach')->name('recettes.attach');
  Route::get('planning/{id}/attach', 'RecetteController@attach_create')->name('recettes.attach_create');
  Route::get('planning', 'RecetteController@my_planning')->name('recettes.planning');
  Route::delete('planning/{id}', 'RecetteController@destroy_planning')->name('planning.destroy');

  //admin routes
  Route::middleware(['admin'])->group(function () {

    Route::resource('users', 'UserController');

  });
});


//CRUD Unités
// Route::get('/unites/{id}', 'UniteController@show')->where('id', '[0-9]+');;
// Route::get('/unites', 'UniteController@index')->name('unites');
