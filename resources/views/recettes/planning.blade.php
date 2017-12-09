@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mon planning</div>
                <div class="panel-body">

                    @foreach ($planning as $recette)

                        <h3>{{ ucfirst(strftime('%A %e %B %Y', strtotime($recette->pivot->at))) }}</h3>
                        <p><a href={{ route('recettes.show', $recette->id)  }}>{{ $recette->nom }}</a></p>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
