@extends('layouts.app')

@section('content')
<div class="homepage_head">
  <div class="homepage_head_container">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-4">
          <h1 class="homepage_head_title">Re7</h1>
          {{ Form::open(array('route' => 'recettes.index', 'method' => 'get')) }}
            <div class="input-group">
              {{ Form::text('recherche', null, [
                'class' => 'form-control input-lg',
                'placeholder' => 'Chercher une recette...'
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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenue sur Re7</div>

                <div class="panel-body">
                    <p>Découvrez de magnifiques recettes à préparer !</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
