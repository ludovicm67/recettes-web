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
                        <p>{{ $user->pseudo }} : {{ $user->mail }}</p>
                    @endforeach

                    <a href={{ route('root') }} >Vers l'accueil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
