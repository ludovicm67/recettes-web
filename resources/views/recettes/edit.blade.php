@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Modifier une recette</div>

        <div class="panel-body">
          {{ Form::model($recette, array('route' => array('recettes.update', $recette->id), 'method' => 'PUT')) }}

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
                {{ Form::number('difficulte', null, array('class' => 'form-control', 'min' => 1, 'max' => 5)) }}

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
                {{ Form::number('prix', null, array('class' => 'form-control', 'min' => 1, 'max' => 5)) }}

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
                {{ Form::number('duree_totale', 0, array('class' => 'form-control', 'min' => 0)) }}

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
                {{ Form::number('nbre_personnes', 1, array('class' => 'form-control', 'min' => 1)) }}

                @if ($errors->has('nbre_personnes'))
                  <span class="help-block">
                    <strong>{{ $errors->first('prix') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <!--INGREDIENTS-->

            @foreach($recette->ingredients as $ingredient)
            <div class="form-group">
              <div class="input_fields_wrap">
                <div>
                  <div class="col-md-4">
                    <label for="ingredient_id[]">Ingrédient</label>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control" name="ingredient_id[]">
                        <option value={{ $ingredient->id }}>{{ $ingredient->nom }}</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <input type="number" class="form-control"
                    name="ingredient_qte[]" min="1" max="5" step="1"
                    value={{ $ingredient->pivot->quantite }}>
                  </div>
                  <a href="#" class="remove_field col-md-1">
                    <span class="glyphicon glyphicon-remove"></span>
                  </a>
                </div>
              </div>
            </div>
            @endforeach

            <div class="form-group">
              <div class="input_fields_wrap">
                <div class="field_to_copy">
                  <div class="col-md-4">
                    {{ Form::label('ingredient_id[]', 'Ingrédient') }}
                  </div>
                  <div class="col-md-4">
                    {{ Form::select('ingredient_id[]', $ingredients, NULL, array('class' => 'form-control')) }}
                  </div>
                  <div class="col-md-2">
                    {{ Form::number('ingredient_qte[]', 1, array('class' => 'form-control', 'min' => 0, 'step' => 0.05)) }}
                  </div>
                  <a href="#" class="remove_field col-md-1">
                    <span class="glyphicon glyphicon-remove"></span>
                  </a>
                </div>
                <div class="newzone"></div>
                <button class="add_field_button btn btn-primary">Ajouter un ingrédient</button>
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
