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
                <img src="{{ $recette->medias->first()->url }}" alt="recette">
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
          <div class="panel-heading">Ingrédients les + populaires</div>
          <div class="panel-body">
            <ul>
              <li>Ingrédient 1</li>
              <li>Ingrédient 2</li>
              <li>Ingrédient 3</li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">Les meilleurs contributeurs</div>
          <div class="panel-body">
            <ul>
              <li>Utilisateur 1</li>
              <li>Utilisateur 2</li>
              <li>Utilisateur 3</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
