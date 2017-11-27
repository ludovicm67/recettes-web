@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingrédients</div>

                <div class="panel-body">
                    <p>{{ $unite->nom }} ({{ $unite->symbole }})</p>

                    <a href={{ route('unites') }}>Liste des unités</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
