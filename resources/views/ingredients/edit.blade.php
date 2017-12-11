@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingrédient "{{ $ingredient->nom }}"</div>

                <div class="panel-body">
                  {{ Form::model($ingredient, array('route' => array('ingredients.update', $ingredient->id), 'method' => 'PUT')) }}

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

                      <div class="form-group{{ $errors->has('calories') ? ' has-error' : '' }}">
                          <div class="col-md-4">
                            {{ Form::label('calories', 'Calories') }}
                          </div>

                          <div class="col-md-6">
                              {{ Form::text('calories', null, array('class' => 'form-control')) }}

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
                              {{ Form::text('lipides', null, array('class' => 'form-control')) }}
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
                              {{ Form::text('glucides', null, array('class' => 'form-control')) }}
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
                              {{ Form::text('protides', null, array('class' => 'form-control')) }}
                              @if ($errors->has('protides'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('protides') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
                          <div class="col-md-4">
                              {{ Form::label('dispo_par_defaut', 'Disponible par défaut') }}
                          </div>
                          <div class="col-md-6">
                              <input type="hidden" name="dispo_par_defaut" value="0"> <!--valeur envoyée quand unchecked-->
                              {{ Form::checkbox('dispo_par_defaut', $ingredient->dispo_par_defaut) }}
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
