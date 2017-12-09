@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Recettes</div>

        <div class="panel-body">
          {{ Form::open(['route' => 'recettes.index', 'method' => 'get']) }}
            {{ Form::label('recherche', 'Recherche') }}
            {{ Form::text('recherche', null, array('class' => 'form-control')) }}

            Classer par :
            <label>{{ Form::radio('tri', 'nom', true) }} Nom</label>
            <label>{{ Form::radio('tri', 'difficulte') }} Difficulté</label>
            <label>{{ Form::radio('tri', 'prix') }} Prix</label>
            <label>{{ Form::radio('tri', 'calories') }} Calories</label>

            {{ Form::submit('Rechercher', ['class' => 'btn btn-primary']) }}
          {{ Form::close() }}

          @foreach ($recettes as $recette)
            <h3><a href={{ route('recettes.show', $recette->id)  }}>{{ $recette->nom }}</a></h3>
            <p>{{ $recette->description }}</p>

            @if (Auth::check() && Auth::user()->isAdmin())
              {{ Form::open(['url' => 'recettes/' . $recette->id, 'class' => 'form-horizontal']) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Supprimer', ['class' => 'btn btn-primary']) }}
              {{ Form::close() }}
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
