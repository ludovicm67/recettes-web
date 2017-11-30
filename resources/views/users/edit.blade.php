@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Utilisateur "{{ $user->pseudo }}"</div>

                <div class="panel-body">
                  {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}


                      <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                          <div class="col-md-4">
                            {{ Form::label('pseudo', 'Pseudo') }}
                          </div>

                          <div class="col-md-6">
                              {{ Form::text('pseudo', null, array('class' => 'form-control')) }}

                              @if ($errors->has('pseudo'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('pseudo') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('mail') ? ' has-error' : '' }}">
                          <div class="col-md-4">
                            {{ Form::label('mail', 'Email') }}
                          </div>

                          <div class="col-md-6">
                              {{ Form::email('mail', null, array('class' => 'form-control')) }}

                              @if ($errors->has('mail'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('mail') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                          <div class="col-md-4">
                            {{ Form::label('display_name', 'Nom affiché') }}
                          </div>
                          <div class="col-md-6">
                              {{ Form::text('display_name', null, array('class' => 'form-control')) }}
                              @if ($errors->has('display_name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('display_name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
                          <div class="col-md-6 col-md-offset-4">
                              <div class="checkbox">
                                  <label> <!--value-->
                                      <input type="checkbox" name="admin" {{ $user->admin ? 'checked' : '' }}> Administrateur
                                  </label>
                              </div>
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
