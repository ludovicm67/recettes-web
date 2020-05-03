@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
      @if ($recette->ingredients->count() > 0)
      <div class="panel panel-default">
        <div class="panel-heading">Ingrédients</div>
        <div class="panel-body">
          <ul>
          @foreach ($recette->ingredients as $ingredient)
            <li>
              <a href={{ route('ingredients.show', $ingredient->id) }}>{{ $ingredient->nom }}</a> :
              {{ $ingredient->pivot->quantite }}
              {{ $ingredient->unite->symbole }}
            </li>
          @endforeach
          </ul>
        </div>
      </div>
      @endif

       <div class="panel panel-default">
        <div class="panel-heading">Apports nutritionnels</div>
        <div class="panel-body">
          <ul>
            <li>Calories : {{ $recette->calories }}</li>
            <li>Lipides : {{ $recette->lipides }}</li>
            <li>Glucides : {{ $recette->glucides }}</li>
            <li>Protides : {{ $recette->protides }}</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>{{ $recette->nom }}</strong>
          par
          <em>{{ $recette->utilisateur->display_name }}</em>
        </div>

        <div class="panel-body">

          <h3>{{ $recette->nom }}</h3>
          <p>{{ $recette->description }}</p>

          <ul>
            <li>{{ $recette->duree_totale }} minutes</li>
            <li>Pour {{ $recette->nbre_personnes }} personne(s)</li>
            <li>Difficulté : {{ $recette->difficulte }}</li>
            <li>Prix : {{ $recette->prix }}</li>
          </ul>

          @foreach($recette->medias as $media)
            <img style="max-width: 100%; max-height: 250px;" src="{{ $media->url }}" alt="Photo recette">
          @endforeach

          @foreach ($recette->etapes as $etape)
            <h4 class="step-title">{{ $etape->nom }} ({{ $etape->type->nom }} - {{ $etape->duree }} minute(s))</h4>
            <p class="step-desc">{{ $etape->description }}</p>
          @endforeach

          @if (Auth::check())
            <a href="{{ route('recettes.attach_create', $recette->id) }}" class="btn btn-primary">Ajouter cette recette à mon planning</a>
            @if (Auth::user()->isAdmin())
              <a href="{{ route('recettes.edit', $recette->id) }}" class="btn btn-primary">Modifier</a>
              <!-- <a href="{{ route('recettes.edit', $recette->id) }}" class="btn btn-primary">Ajouter des étapes</a> -->
              <!-- <a href="{{ route('recettes.edit', $recette->id) }}" class="btn btn-primary">Ajouter des ingrédients</a> -->
            @endif
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
