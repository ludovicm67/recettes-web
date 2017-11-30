<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use Validator;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ingredients = Ingredient::all();
      return view("ingredients.index")->with(['ingredients'=>$ingredients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ingredient = Ingredient::findOrFail($id);
      return view("ingredients.edit")->with(['ingredient'=>$ingredient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'nom'       => 'required',
        'calories'  => 'min:0',
        'lipides'   => 'min:0',
        'glucides'  => 'min:0',
        'protides'  => 'min:0',
        'dispo_par_defaut' => 'boolean'
      ]);

      if ($validator->fails()) {
          return redirect('ingredients/' . $id . '/edit')->withErrors($validator);
      } else {
          $ingredient = Ingredient::findOrFail($id);
          $ingredient->nom = $request['nom'];
          $ingredient->calories = $request['calories'];
          $ingredient->lipides = $request['lipides'];
          $ingredient->glucides = $request['glucides'];
          $ingredient->protides = $request['protides'];
          $ingredient->dispo_par_defaut = $request['dispo_par_defaut'];
          $ingredient->save();

          return redirect('ingredients');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ingredient = Ingredient::find($id);
      $ingredient->delete();
      return redirect('ingredients');
    }
}
