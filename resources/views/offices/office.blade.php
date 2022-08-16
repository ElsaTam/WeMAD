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
        $nb_hunters = count($office->office->agents);
        $nb_hunters_per_col = 10;
    @endphp

    <div id="office" class="p-4">
        <h2 class="text-center mb-4">{{ $office->name }}</h2>

        <div class="hstack gap-3">
            <img src="{{ URL::asset($office->boss->featuredPhoto ? $office->boss->featuredPhoto->src : '/storage/pictures/profile-unknown.png') }}" alt="" class="border border-dark border-4 img-fluid bg-light" width="250">
            
            <div class="">
                <span class="fw-bold">Etat :</span> {{ $office->state->name }}<br>
                @isset($office->boss)
                    <span class="fw-bold">{{ $office->boss->sex == "Homme" ? "Directeur" : "Directrice" }} :</span> {{ $office->boss->first_name }} <span class="text-uppercase">{{ $office->boss->last_name }}</span><br>
                @else
                    <span class="fw-bold">Directeur :</span> N/A<br>
                @endisset
                <span class="fw-bold">Nombre de Chasseurs :</span> {{ $nb_hunters }}<br>
            </div>

            <div class="flex-grow-1 align-self-start bg-light p-3 rounded border border-dark">
                <h5 class="fw-bold text-center mb-3">Chasseurs</h5>
                <div class="d-flex flex-column flex-wrap" id="hunters">
                    @foreach($office->office->agents as $index => $agent)
                        <div>
                            <a href="{{ url('agent/'.$agent->id) }}" class="text-decoration-none">
                                {{ $agent->first_name }} <span class="text-uppercase">{{ $agent->last_name }}</span>
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
                            <a class="stretched-link text-reset" href="{{ url($group->type->id.'/'.$group->id) }}">
                                <h5 class="card-title @isset($group->leader->place->prison) text-decoration-line-through @endisset">{{ $group->type->name }} {{ $group->name }}</h5>
                            </a>
                            <p class="card-text">
                                <span class="fw-bold">{{ $group->leader->sex == "Homme" ? $group->type->leader_alias_m : $group->type->leader_alias_f }} : </span>{{ $group->leader->first_name }} {{ $group->leader->last_name }}<br>
                                <span class="fw-bold">Membres : </span>{{ $group->members->where('person.dead', False)->count() }}<br>
                            </p>
                        </div>
                        <img src="{{ $group->leader->featuredPhoto ? URL::asset($group->leader->featuredPhoto->src) : URL::asset('/storage/pictures/profile-unknown.png') }}" alt="" class="card-img-bottom bg-light @isset($group->leader->place->prison) grayscale @endisset">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection