@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Utilisateurs</div>

                <div class="panel-body">
                    @foreach ($users as $user)
                        <h2>{{ $user->display_name }}</h2>

                        @if($user->admin)
                          <p>Administrateur du site</p>
                        @endif

                        <p>Pseudo : {{ $user->pseudo }}</p>
                        <p>Adresse email : {{ $user->mail }}</p>

                        <!--Boutons d'action-->
                        {{ Form::open(array('url' => 'users/' . $user->id, 'class' => 'form-horizontal')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <a href={{ route('users.edit', $user->id) }}>
                              {{ Form::button('Modifier', array('class' => 'btn btn-primary')) }}
                            </a>
                            {{ Form::submit('Supprimer', array('class' => 'btn btn-primary')) }}
                        {{ Form::close() }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
