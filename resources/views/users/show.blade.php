@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Utilisateur "{{ $user->pseudo }}"</div>

                <div class="panel-body">
                  <form class="form-horizontal" method="PUT" action="{{ route('updateUsers', $user->id) }}">

                      <div class="form-group{{ $errors->has('mail') ? ' has-error' : '' }}">
                          <label for="mail" class="col-md-4 control-label">Adresse email</label>

                          <div class="col-md-6">
                              <input id="mail" type="email" class="form-control" name="mail" value="{{ $user->mail }}" required autofocus>

                              @if ($errors->has('mail'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('mail') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                          <label for="pseudo" class="col-md-4 control-label">Pseudo</label>

                          <div class="col-md-6">
                              <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ $user->pseudo }}" required autofocus>

                              @if ($errors->has('pseudo'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('pseudo') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                          <label for="display_name" class="col-md-4 control-label">Nom affiché sur le site</label>

                          <div class="col-md-6">
                              <input id="display_name" type="text" class="form-control" name="display_name" value="{{ $user->display_name }}" required autofocus>

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
                                  <label>
                                      <input type="checkbox" name="admin" {{ $user->admin ? 'checked' : '' }}> Administrateur
                                  </label>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-8 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Modifier
                              </button>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
