<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use App\Recette;
use App\Ingredient;
use App\Etape;
use App\Type;

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
    setlocale (LC_TIME, 'fr_FR.utf8','fra');

    $planning = Auth::user()->recettes; //orderBy
    // ->where('at', '>=', Carbon::now());
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

    $types = Type::all()->toArray();
    $types = array_column($types, 'nom', 'id');

    return view("recettes.create")->with([
      'ingredients' => $ingredients,
      'types'        => $types
    ]);
  }

  /**
   * Show the form for creating a new relation in 'planning'.
   *
   * @return \Illuminate\Http\Response
   */
  public function attach_create($recette_id) {
    $recette = Recette::findOrFail($recette_id);
    return view("recettes.attach_create")->with('recette', $recette);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    // return dd($request->all());

    $validator = Validator::make($request->all(), [
      'nom'             => 'required',
      'description'     => 'required',
      'prix'            => 'min:1|max:5',
      'difficulte'      => 'min:1|max:5',
      'nbre_personnes'  => 'min:1',
      'calories'        => 'min:0|required',
      'lipides'         => 'min:0|required',
      'glucides'        => 'min:0|required',
      'protides'        => 'min:0|required'
    ]);

    if ($validator->fails()) {
        return redirect('recettes/create')->withErrors($validator);
    } else {

      $recette = new Recette;

      $recette->nom = $request->nom;
      $recette->description = $request->description;
      $recette->prix = $request->prix;
      $recette->difficulte = $request->difficulte;
      $recette->nbre_personnes = $request->nbre_personnes;
      $recette->calories = $request->calories;
      $recette->lipides = $request->lipides;
      $recette->glucides = $request->glucides;
      $recette->protides = $request->protides;

      $recette->id_user = Auth::user()->id;
      //calcul des etapes à éditer
      $recette->duree_totale = 0;

      $recette->save();

      //ajout des ingrédients
      $nbr_ing = count($request->ingredient_id);
      for ($i=0; $i<$nbr_ing; $i++) {
        $recette->ingredients()->attach($request->ingredient_id[$i], [
          'id_recettes' => $recette->id,
          'quantite' => $request->ingredient_qte[$i]
        ]);
      }

      //ajout des étapes
      $nbr_etapes = count($request->etapes);
      for ($i=0; $i<$nbr_etapes; $i++) {

        $etape = new Etape;
        $etape->description = $request->etapes[$i];
        $etape->nom = $request->titres[$i];
        $etape->duree = $request->durees[$i];
        $etape->ordre = $i;
        $etape->id_recettes = $recette->id;
        $etape->id_etape_types = $request->type[$i];
        $etape->save();

        // $recette->etapes()->attach($etape->id);
      }

      return redirect('recettes/' . $recette->id);
    }
  }

  /**
   * Store a newly created relation 'planning' in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function attach(Request $request) {
    $user = Auth::user();

    if($user->recettes->contains($request['recette_id'])) {
      return redirect('planning');
    }

    $user->recettes()->attach($request['recette_id'], ['at' => $request['date']]);

    return redirect('/planning');
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

    $recette = Recette::findOrFail($id);

    return view("recettes.edit")->with([
      'ingredients' => $ingredients,
      'recette' => $recette
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
    $validator = Validator::make($request->all(), [
      'nom'             => 'required',
      'description'     => 'required',
      'prix'            => 'min:1|max:5',
      'difficulte'      => 'min:1|max:5',
      'nbre_personnes'  => 'min:1',
      'calories'        => 'min:0|required',
      'lipides'         => 'min:0|required',
      'glucides'        => 'min:0|required',
      'protides'        => 'min:0|required'
    ]);

    if ($validator->fails()) {
        return redirect('recettes/' . $id . '/edit')->withErrors($validator);
    } else {
        $recette = Recette::findOrFail($id);
        $recette->nom = $request['nom'];
        $recette->description = $request['description'];
        $recette->prix = $request['prix'];
        $recette->difficulte = $request['difficulte'];
        $recette->nbre_personnes = $request['nbre_personnes'];
        $recette->calories = $request['calories'];
        $recette->lipides = $request['lipides'];
        $recette->glucides = $request['glucides'];
        $recette->protides = $request['protides'];
        $recette->save();

        //ajout des ingrédients
        $nbr_ing = count($request->ingredient_id);
        for ($i=0; $i<$nbr_ing; $i++) {
          $recette->ingredients()->attach($request->ingredient_id[$i], [
            'id_recettes' => $recette->id,
            'quantite' => $request->ingredient_qte[$i]
          ]);
        }

        return redirect('recettes');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
      $recette = Recette::find($id);
      //on supprime les relations de la recette
      $recette->ingredients()->detach();
      //peu importe si la recette fait partie d'un planning utilisateur
      $recette->plannings()->detach();
      $recette->delete();
      return redirect('recettes');
  }


  /**
   * Remove the specified relation from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy_planning($id) {
    $user = Auth::user();
    $user->recettes()->detach($id);

    return redirect('/planning');
  }


}
