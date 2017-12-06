@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Modifier une recette</div>

        <div class="panel-body">
          {{ Form::open(array('route' => array('recettes.store'))) }}


            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
              <div class="col-md-4">
              {{ Form::label('nom', 'Nom') }}
              </div>

              <div class="col-md-6">
                {{ Form::text('nom', null, array('class' => 'form-control')) }}

                @if ($errors->has('nom'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nom') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
              <div class="col-md-4">
              {{ Form::label('description', 'Description') }}
              </div>

              <div class="col-md-6">
                {{ Form::textarea('description', null, array('class' => 'form-control')) }}

                @if ($errors->has('description'))
                  <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('difficulte') ? ' has-error' : '' }}">
              <div class="col-md-4">
              {{ Form::label('difficulte', 'Difficulté') }}
              </div>

              <div class="col-md-6">
                {{ Form::number('difficulte', null, array('class' => 'form-control')) }}

                @if ($errors->has('difficulte'))
                  <span class="help-block">
                    <strong>{{ $errors->first('difficulte') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('prix') ? ' has-error' : '' }}">
              <div class="col-md-4">
              {{ Form::label('prix', 'Prix') }}
              </div>

              <div class="col-md-6">
                {{ Form::number('prix', null, array('class' => 'form-control')) }}

                @if ($errors->has('prix'))
                  <span class="help-block">
                    <strong>{{ $errors->first('prix') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('duree_totale') ? ' has-error' : '' }}">
              <div class="col-md-4">
              {{ Form::label('duree_totale', 'Durée totale') }}
              </div>

              <div class="col-md-6">
                {{ Form::number('duree_totale', null, array('class' => 'form-control')) }}

                @if ($errors->has('duree_totale'))
                  <span class="help-block">
                    <strong>{{ $errors->first('duree_totale') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('nbre_personnes') ? ' has-error' : '' }}">
              <div class="col-md-4">
              {{ Form::label('nbre_personnes', 'Nombre de personnes') }}
              </div>

              <div class="col-md-6">
                {{ Form::number('nbre_personnes', null, array('class' => 'form-control')) }}

                @if ($errors->has('nbre_personnes'))
                  <span class="help-block">
                    <strong>{{ $errors->first('prix') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            {{ Form::select('ingredients', $ingredients, NULL, array('multiple')) }}


            <!---valeurs à calculer-->

            <div class="form-group{{ $errors->has('calories') ? ' has-error' : '' }}">
              <div class="col-md-4">
              {{ Form::label('calories', 'Calories') }}
              </div>

              <div class="col-md-6">
                {{ Form::number('calories', null, array('class' => 'form-control')) }}

                @if ($errors->has('calories'))
                  <span class="help-block">
                    <strong>{{ $errors->first('calories') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
              <div class="col-md-4">
              {{ Form::label('lipides', 'Lipides') }}
              </div>
              <div class="col-md-6">
                {{ Form::number('lipides', null, array('class' => 'form-control')) }}
                @if ($errors->has('lipides'))
                  <span class="help-block">
                    <strong>{{ $errors->first('lipides') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('glucides') ? ' has-error' : '' }}">
              <div class="col-md-4">
              {{ Form::label('glucides', 'Glucides') }}
              </div>
              <div class="col-md-6">
                {{ Form::number('glucides', null, array('class' => 'form-control')) }}
                @if ($errors->has('glucides'))
                  <span class="help-block">
                    <strong>{{ $errors->first('glucides') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('protides') ? ' has-error' : '' }}">
              <div class="col-md-4">
              {{ Form::label('protides', 'Protides') }}
              </div>
              <div class="col-md-6">
                {{ Form::number('protides', null, array('class' => 'form-control')) }}
                @if ($errors->has('protides'))
                  <span class="help-block">
                    <strong>{{ $errors->first('protides') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                {{ Form::submit('Valider', array('class' => 'btn btn-primary')) }}
              </div>
            </div>

          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
