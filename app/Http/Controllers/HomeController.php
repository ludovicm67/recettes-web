<?php

namespace App\Http\Controllers;

use App\Recette;
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

    return view("welcome")->with([
      'recettes' => $recettes
    ]);
  }
}
