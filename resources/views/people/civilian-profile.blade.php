<?php

use App\Custom\StringHelpers;

?>

@extends('layouts.app')


@section('content')

<h4 class="text-center">Fiche personnelle du civil</h4>

<div class="d-flex gap-3 mb-3">
    <img src="{{ URL::asset($civilian->featuredPhoto ? $civilian->featuredPhoto->src : '/storage/pictures/profile-unknown.png') }}" style="width: 250px; object-fit: cover;">
    <div class="d-flex flex-column gap-2">
        <h5 class="my-3">
            {{ $civilian->sex == "Homme" ? "Mr." : "Mme." }} <span class="text-uppercase">{{ $civilian->last_name }}</span> {{ $civilian->first_name }}
        </h5>

        <div>
            <i class="fa-solid fa-location-pin me-2"></i>
            @if(isset( $civilian->place->prison ))
                <div class="bg-warning p-3">
                    En prison : {{ $civilian->place->name }}, {{ $civilian->place->state->name }} ({{ $civilian->place->state_id }})
                </div>
            @elseif(isset( $civilian->place->office ))
                Agence de référence : <a href="{{url('offices/'.$civilian->place_id)}}">{{ $civilian->place->name }}, {{ $civilian->place->state->name }} ({{ $civilian->place->state_id }})</a>
            @endif
        </div>

        @if ($civilian->kind != "Humain" && $civilian->kind != "Inconnue")
            <div>
                <i class="fa-solid fa-users-between-lines me-2"></i>
                @php
                    if (isset($civilian->vampire->group)) {
                        $group = $civilian->vampire->group;
                    }
                    elseif (isset($civilian->warlock->group)) {
                        $group = $civilian->warlock->group;
                    }
                    elseif (isset($civilian->werewolf->group)) {
                        $group = $civilian->werewolf->group;
                    }
                @endphp
                @if (isset($group))
                    <a href="{{url($group->type->id).'/'.$group->id}}">{{ $group->type->name }} {{ $group->name }}</a>
                @else
                    <span class="bg-warning py-1 px-2">Renégat</span>
                @endif
            </div>
        @endif
    </div>
</div>

@include("people.inc.table-person-info", ["person" => $civilian])

@if ($civilian->vampire)
    @include("people.inc.vampire-tree", ["vampire" => $civilian->vampire])
@endif

@endsection