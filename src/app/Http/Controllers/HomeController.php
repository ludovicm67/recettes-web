<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recette;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller {

  /*
   * Contenu de la page d'accueil
   */
  public function index() {
    $recettes = Recette::search("")
      ->with('ingredients')
      ->orderBy('id', 'DESC')
      ->get();

    $ingredients = Ingredient::orderBy('id', 'DESC')->take(5)->get();
    $users = User::orderBy('id', 'DESC')->take(5)->get();

    return view("welcome")->with([
      'recettes' => $recettes,
      'ingredients' => $ingredients,
      'users' => $users
    ]);
  }
}
