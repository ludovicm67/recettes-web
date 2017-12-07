@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Ajouter cette recette à mon planning</div>

        <div class="panel-body">
          Ajouter la recette "{{ $recette->nom }}" ?

          {{ Form::open(array('route' => ['recettes.attach', $recette->id])) }}
            {{ Form::date('date', date('Y-m-d')) }}
            {{ Form::hidden('recette_id', $recette->id) }}
            {{ Form::submit('Valider') }}
          {{ Form::close() }}

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
