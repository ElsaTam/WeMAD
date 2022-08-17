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

                            <!-- NAME -->

                            <p class="card-title fw-bold">
                                <a class="stretched-link text-decoration-none link-dark" href="{{ url($person->link) }}">
                                    {{ $person->title }} {{ $person->last_first_name }}
                                </a>
                            </p>
                            <p class="card-text">

                                <!-- TYPE or AGENT -->

                                <i class="fa-solid fa-user"></i>
                                @if ($person->status == "agent")
                                    <span class="fw-bold">Agent</span><br>
                                @else
                                    {{ $person->type }}<br>
                                @endif

                                <!-- PLACE -->
                                
                                @isset($person->place)
                                    <i class="fa-solid fa-location-pin"></i>
                                    <span class="fw-bold">{{ $person->place->type }}</span> {{ $person->place->full_name }}<br>
                                @endisset
                            </p>
                        </div>



                        <!-- BADGES FOR STATUS -->

                        <div class="d-flex flex-column gap-1 position-absolute top-0 end-0 m-2">
                            @if ($person->is_prisoner)
                                <span class="badge bg-warning p-2"><i class="fa-solid fa-handcuffs me-2 fa-lg"></i> En prison</span><br>
                            @endif
                            @if ($person->is_wanted)
                                <span class="badge bg-danger p-2"><i class="fa-solid fa-circle-exclamation me-2 fa-lg"></i> Fugitif</span><br>
                            @endif
                            @if ($person->is_missing)
                                <span class="badge bg-danger p-2"><i class="fa-solid fa-circle-question me-2 fa-lg"></i> Disparu</span><br>
                            @endif
                            @if ($person->is_renegade)
                                <span class="badge bg-info p-2"><i class="fa-solid fa-person-rays me-2 fa-lg"></i> Renégat</span>
                            @endif
                            @if ($person->dead)
                                <span class="badge bg-dark p-2"><i class="fa-solid fa-skull me-2 fa-lg"></i> Morte</span>
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