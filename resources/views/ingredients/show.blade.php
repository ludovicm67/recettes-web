@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Ingrédient "{{ $ingredient->nom }}"</div>

        <div class="panel-body">
          <p>Le <strong>{{ $ingredient->nom }}</strong> est un ingrédient qui possède
            <strong>{{ $ingredient->calories }}</strong> calories,
            <strong>{{ $ingredient->lipides }}</strong> lipides,
            <strong>{{ $ingredient->glucides }}</strong> glucides et
            <strong>{{ $ingredient->protides }}</strong> protides.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
