<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingrédients</div>

                <div class="panel-body">
                    @foreach ($unites as $unite)
                        <p>
                          <a href={{ route('unites') }}>
                            {{ $unite->nom }} ({{ $unite->symbole }})
                          </a>
                        </p>
                    @endforeach

                    <a href={{ route('root') }} >Vers l'accueil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
