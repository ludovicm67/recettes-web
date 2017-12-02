@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Recettes</div>

                <div class="panel-body">
                    {{ Form::open(array('route' => 'recettes.index', 'method' => 'get')) }}
                      {{ Form::label('recherche', 'Recherche') }}
                      {{ Form::text('recherche', null, array('class' => 'form-control')) }}
                      {{ Form::submit('Rechercher', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}

                    @foreach ($recettes as $recette)
                        <h3>{{ $recette->nom }}</h3>
                        <p>{{ $recette->description }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
