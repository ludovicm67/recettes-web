@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingrédients</div>

                <div class="panel-body">
                    @foreach ($ingredients as $ingredient)
                      <h2>{{$ingredient->nom }}</h2>
                      <ul>
                        <li>Calories : {{ $ingredient->calories }}</li>
                        <li>Lipides : {{ $ingredient->lipides }}</li>
                        <li>Glucides : {{ $ingredient->glucides }}</li>
                        <li>Protides : {{ $ingredient->protides }}</li>
                      </ul>
                    @endforeach

                    <a href={{ route('root') }} >Vers l'accueil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
