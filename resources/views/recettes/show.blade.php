@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $recette->nom }} par
                  <strong>{{ $recette->utilisateur->display_name }}</strong>
                </div>

                <div class="panel-body">

                  <h3>{{ $recette->nom }}</h3>
                  <ul>
                    <li>{{ $recette->duree_totale }} minutes</li>
                    <li>Pour {{ $recette->nbre_personnes }} personne(s)</li>
                    <li>Difficulté : {{ $recette->difficulte }}</li>
                    <li>Prix : {{ $recette->prix }}</li>
                  </ul>

                  <p>{{ $recette->description }}</p>
                  
                  <p>Apports nutritionnels</p>
                  <ul>
                    <li>Calories : {{ $recette->calories }}</li>
                    <li>lipides : {{ $recette->lipides }}</li>
                    <li>glucides : {{ $recette->glucides }}</li>
                    <li>protides : {{ $recette->protides }}</li>
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
