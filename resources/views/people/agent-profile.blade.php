<?php

use App\Custom\StringHelpers;

?>

@extends('layouts.app')


@section('content')

<h4 class="text-center">Fiche personnelle de l'agent</h4>

<div class="d-flex gap-3 mb-3">
    <img src="{{ URL::asset($agent->featuredPhoto) }}" style="width: 250px; object-fit: cover;">
    <div class="d-flex flex-column gap-2">
        <h5 class="my-3">
            {{ $agent->sex == "Homme" ? "Mr." : "Mme." }} <span class="text-uppercase">{{ $agent->last_name }}</span> {{ $agent->first_name }}
        </h5>
        
        <div>
            <i class="fa-solid fa-location-pin me-2"></i>
            <span><span class="fw-bold">Agence</span> : {{ $agent->place->name }}, {{ $agent->place->state->name }} ({{ $agent->place->state_id }})</span>
        </div>
        
        <div>
            <i class="fa-solid fa-phone me-2"></i>
            <span><span class="fw-bold">Tél.</span> : XXX-XXX-XXXX</span>
        </div>
        
        <div>
            <i class="fa-solid fa-at me-2"></i>
            <span>
                <span class="fw-bold">Courriel</span> :
                @php
                    $clean_first_name = mb_strtolower(preg_replace("/[^a-zA-Z]+/", "", StringHelpers::remove_accents($agent->first_name)));
                    $clean_last_name = mb_strtolower(preg_replace("/[^a-zA-Z]+/", "", StringHelpers::remove_accents($agent->last_name)));
                    $concat_names = $clean_first_name.'.'.$clean_last_name;
                    $mail_ext = mb_strtolower($agent->place->name).'-'.mb_strtolower($agent->place->state_id);
                @endphp
                <a href="#">{{ $concat_names }}&commat;{{ $mail_ext }}.wemad.us</a>
            </span>
        </div>
    </div>
</div>

@include("people.inc.table-person-info", ["person" => $agent])

@endsection