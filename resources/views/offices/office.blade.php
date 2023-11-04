@extends('layouts.app')

@section('style')
    <style>
        /*
        $grid-breakpoints: (
            xs: 0,
            sm: 576px,
            md: 768px,
            lg: 992px,
            xl: 1200px,
            xxl: 1400px
        );
        */

        @media (min-width: 768px) {
            #hunters {
                height: 100%;
            }
        }
        @media (min-width: 992px) {
            #hunters {
                height: 400px;
            }
        }
        @media (min-width: 1200px) {
            #hunters {
                height: 250px;
            }
        }

        #hunters a {
            color: inherit;
        }
        #hunters a:hover {
            color: #0d6efd;
        }
    </style>
@endsection



@section('sub-header')
    @include('offices.inc.offices-navbar')
@endsection





@section('content')

    @php
        $nb_hunters = count($office->agents);
        $nb_hunters_per_col = 10;
    @endphp

    <div id="office" class="p-4">
        <h2 class="text-center mb-4">{{ $office->name }}</h2>

        <div class="hstack gap-3">
            <img src="{{ URL::asset($office->boss->featuredPhoto) }}" alt="" class="border border-dark border-4 img-fluid bg-light" width="250">
            
            <div class="">
                <span class="fw-bold">Etat :</span> {{ $office->state->name }}<br>
                @isset($office->boss)
                    <span class="fw-bold">{{ $office->boss->sex == "Homme" ? "Directeur" : "Directrice" }} :</span> {{ $office->boss->first_last_name }}<br>
                @else
                    <span class="fw-bold">Directeur :</span> N/A<br>
                @endisset
                <span class="fw-bold">Nombre de Chasseurs :</span> {{ $nb_hunters }}<br>
            </div>

            <div class="flex-grow-1 align-self-start bg-light p-3 rounded border border-dark">
                <h5 class="fw-bold text-center mb-3">Chasseurs</h5>
                <div class="d-flex flex-column flex-wrap" id="hunters">
                    @foreach($office->agents as $index => $agent)
                        <div>
                            <a href="{{ url('agents/'.$agent->id) }}" class="text-decoration-none">
                                {{ $agent->first_last_name }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <hr>

        <h4 class="text-center mb-3">Créatures cachées</h4>

        <div class="row row-cols-auto g-4 photo-gallery">
            @foreach($groups as $group)
                <div class="col">
                    <div class="card h-100 shadow" style="width: 16rem;">
                        <div class="card-body">
                            <a class="stretched-link text-reset" href="{{ url($group->link) }}">
                                <h5 class="card-title @if($group->leader->is_prisoner) text-decoration-line-through @endif">{{ $group->full_name }}</h5>
                            </a>
                            <p class="card-text">
                                <span class="fw-bold">{{ $group->leader->leader_title }} : </span>{{ $group->leader->first_last_name }}<br>
                                <span class="fw-bold">Membres : </span>{{ $group->members_count }}<br>
                            </p>
                        </div>
                        <img src="{{ URL::asset($group->leader->featuredPhoto) }}" alt="" class="card-img-bottom bg-light @if($group->leader->is_prisoner) grayscale @endif">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection