@extends('layouts.app')

@section('content')
<div class="homepage_head">
  <div class="homepage_head_container">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1 class="homepage_head_title">Re7</h1>
          {{ Form::open(array('route' => 'recettes.index', 'method' => 'get')) }}
            <div class="input-group">
              {{ Form::text('recherche', null, [
                'class' => 'form-control input-lg',
                'placeholder' => 'Chercher une recette...',
                'autofocus'
              ]) }}
              <div class="input-group-btn">
                <button class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-search"></span></button>
              </div>
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
<div class="homepage_content">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2>Les dernières recettes</h2>
        <div class="row">
          @foreach ($recettes as $recette)
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                @if ($recette->medias->first())
                  <img src="{{ $recette->medias->first()->url }}" alt="recette">
                @endif
                <div class="caption">
                  <h3>{{ $recette->nom }}</h3>
                  <p>{{ $recette->description }}</p>
                  <p><a href="{{ route('recettes.show', $recette->id) }}" class="btn btn-primary" role="button">Consulter</a></p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">Les 5 derniers ingrédients ajoutés</div>
          <div class="panel-body">
            <ul>
              @foreach ($ingredients as $ingredient)
                <li><a href="{{ route('ingredients.show', $ingredient->id) }}">{{ $ingredient->nom }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">Les nouveaux arrivants :</div>
          <div class="panel-body">
            <ul>
              @foreach ($users as $user)
                <li>{{ $user->display_name }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
