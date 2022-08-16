<?php

use App\Custom\StringHelpers;

?>

@extends('layouts.app')


@section('content')

<h4 class="text-center">Rechercher une personne</h4>

@include('database.inc.search-people')

@isset($results)
<h4 class="text-center mt-4">Résultats de la recherche</h4>
<h5 class="text-center text-info mb-3">{{ $results->total() }} résultats</h5>

<div class="container p-0">
    @if(count($results) > 0)
        {{ $results->links() }}
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 g-2 mb-3">
            @foreach($results as $person)
                <div class="col">
                    <div class="card h-100 bg-light rounded-0 justify-content-center">
                        <div class="card-body">
                            <p class="card-title fw-bold">
                                @php
                                    $link = "#";
                                    if ($person->type == "Agent") {
                                        $link = 'agent/'.$person->id;
                                    }
                                    elseif ($person->type == "Wanted") {
                                        $link = 'wanted/'.$person->id;
                                    }
                                    elseif ($person->type == "Missing") {
                                        $link = 'missing/'.$person->id;
                                    }
                                    else {
                                        $link = 'civilian/'.$person->id;
                                    }
                                @endphp
                                <a class="stretched-link text-decoration-none link-dark" href="{{ url($link) }}">
                                    {{ $person->sex == "Homme" ? "Mr." : "Mme." }} <span class="text-uppercase">{{ $person->last_name }}</span> {{ $person->first_name }}
                                </a>
                            </p>
                            <p class="card-text">
                                <i class="fa-solid fa-user"></i>
                                <span class="fw-bold">
                                    @if ($person->type == "Civilian" || $person->type == "Wanted" || $person->type == "Missing")
                                        Civil,
                                    @elseif ($person->type == "Agent")
                                        Agent,
                                    @endif
                                </span>{{ $person->kind }}<br>
                                <i class="fa-solid fa-location-pin"></i>
                                <span class="fw-bold">
                                @if(isset( $person->place->prison ))
                                    Prison
                                @elseif(isset( $person->place->office ))
                                    Agence
                                @endif
                                </span>
                                {{ $person->place->name }}, {{ $person->place->state->name }} ({{ $person->place->state_id }})<br>
                            </p>
                        </div>
                        <div class="d-flex flex-column gap-1 position-absolute top-0 end-0 m-2">
                        @if( isset( $person->place->prison ) )
                            <span class="badge bg-warning p-2">En prison</span>
                        @elseif( $person->type == "Wanted" )
                            <span class="badge bg-danger p-2">Fugitif</span>
                        @elseif( $person->type == "Missing" )
                            <span class="badge bg-danger p-2">Disparu</span>
                        @elseif( (isset($person->vampire) && !$person->vampire->clan ) || (isset($person->warlock) && !$person->warlock->circle ) || (isset($person->werewolf) && !$person->werewolf->pack ) )
                            <span class="badge bg-info p-2">Renégat</span>
                        @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $results->links() }}
    @endif
</div>
@endisset



@endsection