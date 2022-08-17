@extends('layouts.app')


@section('sub-header')
    @include('people.inc.wanteds-navbar')
@endsection



@section('content')

    <div id="people">
        <h3 class="p-4 bg-danger text-light text-uppercase fw-bold">
            Personne disparue
        </h3>
        
        <div class="p-2">
            <h2 class="text-center">{{$missing->first_name}} {{$missing->last_name}}</h2>
            <div class="d-flex justify-content-center">
                @foreach($missing->photos as $photo)
                    <img src="{{ URL::asset($photo->src) }}" alt="{{ $photo->src }}" class="m-3 border border-dark border-4">
                @endforeach
            </div>
            
            <h5 class="text-center text-uppercase text-danger fw-bold">Description</h5>
            @include("people.inc.table-person-info", ["person" => $missing])

            @isset($missing->criminalRecord)
                @if(! is_null($missing->criminalRecord->reward))
                <h5 class="text-center text-uppercase text-danger fw-bold">Récompense</h5>
                <p class="fw-bold">Le WeMAD offre une récompense pouvant aller jusqu'à {{ number_format($missing->criminalRecord->reward, 0, '.', ' ') }}$ pour toute information menant à l'arrestation de {{$missing->first_name}} {{$missing->last_name}}.</p>
                @endif
                @if(! is_null($missing->criminalRecord->remarks))
                <h5 class="text-center text-uppercase text-danger fw-bold">Remarques</h5>
                @foreach(explode('\\', $missing->criminalRecord->remarks) as $par)
                    <p>{{$par}}</p>
                @endforeach
                @endif
                @if(! is_null($missing->criminalRecord->caution))
                <h5 class="text-center text-uppercase text-danger fw-bold">Mise en garde</h5>
                @foreach(explode('\\', $missing->criminalRecord->caution) as $par)
                    <p>{{$par}}</p>
                @endforeach
                @endif
                @if(! is_null($missing->criminalRecord->danger))
                <h5 class="text-center text-uppercase text-danger fw-bold">{{$missing->criminalRecord->danger}}</h5>
                @endif
            @endisset
            
            <hr>
            <p class="fw-bold">Si vous avez des informations concernant cette personne, veuillez contacter votre bureau local du WeMAD ou de l'Ordre le plus proche.</p>
            <p><span class="fw-bold">Bureau : </span><a href="{{ url('offices/'.$missing->place->id) }}">{{$missing->place->name}}</a></p>
        </div>
    </div>

@endsection