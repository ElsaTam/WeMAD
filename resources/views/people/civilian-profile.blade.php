<?php

use App\Custom\StringHelpers;

?>

@extends('layouts.app')


@section('content')

<h4 class="text-center">Fiche personnelle du civil</h4>

<div class="d-flex gap-3 mb-3">
    <img src="{{ URL::asset($civilian->featuredPhoto) }}" style="width: 250px; object-fit: cover;">
    <div class="d-flex flex-column gap-2">
        <h5 class="my-3">
            {{ $civilian->title }} {{ $civilian->first_last_name }}
            @if ($civilian->dead)
            <span class="badge bg-dark p-2"><i class="fa-solid fa-skull me-2 fa-lg"></i> Mort</span>
            @endif
        </h5>

        <div>
            <i class="fa-solid fa-location-pin me-2"></i>
            @if ($civilian->dead)Dernière agence @else Agence @endif de référence : <a href="{{url($civilian->place->link)}}">{{ $civilian->place->fullname }}</a>
        </div>

        @if ($civilian->is_hidden_creature)
            <div>
                <i class="fa-solid fa-users-between-lines me-2"></i>
                @if (@isset($civilian->group))
                    <a href="{{ url($civilian->group->link) }}">{{ $civilian->group->fullname }}</a>
                @else
                    <span class="bg-warning py-1 px-2">Renégat</span>
                @endif
            </div>
        @endif
    </div>
</div>

@include("people.inc.table-person-info", ["person" => $civilian])

@if ($civilian->type == "Vampire")
    @include("people.inc.vampire-tree", ["vampire" => $civilian])
@endif

@endsection