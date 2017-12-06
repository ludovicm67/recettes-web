<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Recette;
use App\Ingredient;

class RecetteController extends Controller {

  /**
   * Display the searched resources.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request) {
    if (!$request['tri']) $request['tri'] = 'nom';

    $recettes = Recette::search($request['recherche'])
      ->with('ingredients')
      ->orderBy($request['tri'])
      ->get();

    return view("recettes.index")->with([
      'recettes' => $recettes
    ]);
  }

  /**
   * Display the resource for one user.
   *
   * @return \Illuminate\Http\Response
   */
  public function my_planning() {
    $planning = Auth::user()->recettes;
    // ->where('at', '>=', Carbon::now())
    // ->where('at', '<=', Carbon::now()->addWeek());

    return view("recettes.planning")->with([
      'planning' => $planning
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $ingredients = Ingredient::all()->toArray();
    $ingredients = array_column($ingredients, 'nom', 'id');

    return view("recettes.create")->with([
      'ingredients' => $ingredients
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $recette = Recette::findOrFail($id);
    return view("recettes.show")->with([
      'recette' => $recette
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $ingredients = Ingredient::all()->toArray();
    $ingredients = array_column($ingredients, 'nom', 'id');

    return view("recettes.edit")->with([
      'ingredients' => $ingredients,
      'recette_id' => $id
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    //
  }
}
