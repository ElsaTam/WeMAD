<?php

use App\Custom\Date;

?>

@extends('layouts.app')

@section('content')

    
    <div class="bg-white p-2">

        @include('inc.back-link', ["url" => $group->office->link])
        
        <h3 class="text-center @isset($group->leader->place->prison) text-decoration-line-through @endisset">{{ $group->full_name }}</h3>

        <div class="row row-cols-auto g-4 justify-content-center photo-gallery mt-0">
            @foreach($members as $member)
                <div class="col">
                    <div class="card h-100 border-3 border-start-0 border-top-0 border-end-0 rounded-0 bg-light" style="width: 250px">
                        <img src="{{ $member->featuredPhoto }}" class="card-img-top" alt="">
                        <div class="card-body p-1">
                            <p class="card-text text-info">
                                <span class="text-dark">
                                    <a href="{{ url($member->link) }}" class="stretched-link text-decoration-none link-dark">{{ $member->first_last_name }}</a>
                                    @if($member->is_leader)
                                        (<span class="card-text fw-bold">{{ $member->leader_title }}</span>)
                                    @endif
                                </span>
                                <br>
                                Âge : {{ $member->age }} ans
                                <br>
                                @isset( $member->sire_id )
                                {{ $member->sire->sex == "Homme" ? "Sire" : "Dame" }} : {{ $member->sire->first_name }} {{ $member->sire->last_name }}
                                @endisset
                            </p>
                        </div>
                        @if( $member->self_control )
                        <span class="position-absolute top-0 start-0 badge bg-success translate-middle-y mx-2">Maîtrise</span>
                        @endif
                        @include("inc.status-badges", ["person" => $member])
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection