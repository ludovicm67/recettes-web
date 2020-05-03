@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingrédients</div>

                <div class="panel-body">
                    @foreach ($ingredients as $ingredient)
                      <h2><a href="{{ route('ingredients.show', $ingredient->id) }}">{{$ingredient->nom }}</a></h2>
                      <ul>
                        <li>Calories : {{ $ingredient->calories }}</li>
                        <li>Lipides : {{ $ingredient->lipides }}</li>
                        <li>Glucides : {{ $ingredient->glucides }}</li>
                        <li>Protides : {{ $ingredient->protides }}</li>
                      </ul>

                      <!--Boutons d'action-->
                      @if(Auth::user()->isAdmin())
                        {{ Form::open(array('url' => 'ingredients/' . $ingredient->id, 'class' => 'form-horizontal')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <a href={{ route('ingredients.edit', $ingredient->id) }}>
                              {{ Form::button('Modifier', array('class' => 'btn btn-primary')) }}
                            </a>
                            {{ Form::submit('Supprimer', array('class' => 'btn btn-primary')) }}
                        {{ Form::close() }}
                      @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
