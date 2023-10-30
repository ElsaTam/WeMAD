@extends('layouts.app')


@section('sub-header')
    @include('offices.inc.offices-navbar')
@endsection



@section('content')

    <div class="w-75 mx-auto my-5" id="offices-map"></div>

    <h4 class="text-center">{{ $title }}</h4>

    <div class="row row-cols-auto g-4 justify-content-center photo-gallery mt-0">
        @foreach($council as $office)
            <div class="col">
                <div class="card h-100 border-3 border-start-0 border-top-0 border-end-0 rounded-0" style="width: 250px; background-color: rgb(230, 229, 240);">
                    <div class="card-header text-center">
                        <a class="stretched-link link-dark text-decoration-none" href="{{ url($office->link) }}">
                            <h5>{{ $office->state->id }}, {{ $office->name }}</h5>
                        </a>
                    </div>
                    <img src="{{ URL::asset($office->boss->featuredPhoto) }}" alt="">
                    <div class="card-body p-1">
                        <p class="card-text text-center">
                            <span class="fw-bold">{{ $office->boss->sex == "Homme" ? "Directeur" : "Directrice" }} :</span> {{ $office->boss->first_last_name }}
                            <br>
                            <span class="fw-bold text-secondary">Nombre de Chasseurs :</span> {{ count($office->agents) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection