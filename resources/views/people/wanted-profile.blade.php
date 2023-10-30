@extends('layouts.app')


@section('sub-header')
    @include('people.inc.wanteds-navbar')
@endsection



@section('content')

    <div id="people">
        <h3 class="p-4 bg-danger text-light text-uppercase fw-bold">
            @if($wanted->criminalRecord->most_wanted == True)
                Dix fugitifs les plus recherchés du WeMAD
            @else
                Fugitif
            @endif
        </h3>
        
        <div class="p-2">
            <h2 class="text-center">{{$wanted->first_last_name}}</h2>
            <p class="text-center">
                @foreach ($wanted->criminalRecord->crimes as $index => $crime)
                    {{ $crime->charge }}
                    @if ($index < count($wanted->criminalRecord->crimes) - 1)
                        ;
                    @endif
                @endforeach
            </p>
            <div class="d-flex justify-content-center">
                @foreach($wanted->photos as $photo)
                    <img src="{{ URL::asset($photo->src) }}" alt="{{ $photo->src }}" class="m-3 border border-dark border-4">
                @endforeach
            </div>
            
            <h5 class="text-center text-uppercase text-danger fw-bold">Description</h5>
            @include("people.inc.table-person-info", ["person" => $wanted])

            @if(! is_null($wanted->criminalRecord->reward))
            <h5 class="text-center text-uppercase text-danger fw-bold">Récompense</h5>
            <p class="fw-bold">Le WeMAD offre une récompense pouvant aller jusqu'à {{ number_format($wanted->criminalRecord->reward, 0, '.', ' ') }}$ pour toute information menant à l'arrestation de {{$wanted->first_name}} {{$wanted->last_name}}.</p>
            @endif

            @if(! is_null($wanted->criminalRecord->remarks))
            <h5 class="text-center text-uppercase text-danger fw-bold">Remarques</h5>
            @foreach(explode('\\', $wanted->criminalRecord->remarks) as $par)
                <p>{!! $par !!}</p>
            @endforeach
            @endif

            @if(! is_null($wanted->criminalRecord->caution))
            <h5 class="text-center text-uppercase text-danger fw-bold">Mise en garde</h5>
            @foreach(explode('\\', $wanted->criminalRecord->caution) as $par)
                <p>{!! $par !!}</p>
            @endforeach
            @endif

            @if(! is_null($wanted->criminalRecord->danger))
            <h5 class="text-center text-uppercase text-danger fw-bold">{{$wanted->criminalRecord->danger}}</h5>
            @endif
            
            <hr>

            <p class="fw-bold">Si vous avez des informations concernant cette personne, veuillez contacter votre bureau local du WeMAD ou de l'Ordre le plus proche.</p>
            <p><span class="fw-bold">Bureau : </span><a href="{{ url($wanted->place->link) }}">{{$wanted->place->fullname}}</a></p>
        </div>
    </div>

@endsection