<?php

use App\Custom\Date;

?>

@extends('layouts.app')

@section('content')

    
    <div class="bg-white p-2">

        @include('inc.back-link', ["url" => "offices/".$group->office->id])
        
        <h3 class="text-center @isset($group->leader->place->prison) text-decoration-line-through @endisset">{{ $group->type->name }} {{ $group->name }}</h3>

        <div class="row row-cols-auto g-4 justify-content-center photo-gallery mt-0">
            @foreach($members as $member)
                <div class="col">
                    <div class="card h-100 border-3 border-start-0 border-top-0 border-end-0 rounded-0 bg-light" style="width: 250px">
                        <img src="{{ $member->featuredPhoto ? URL::asset($member->featuredPhoto->src) : URL::asset('/storage/pictures/profile-unknown.png') }}" class="card-img-top" alt="">
                        <div class="card-body p-1">
                            <p class="card-text text-info">
                                <span class="text-dark">
                                    <a href="{{ url(strtolower($member->type)."/".$member->id)}}" class="stretched-link text-decoration-none link-dark">{{ $member->first_name }} {{ $member->last_name }}</a>
                                    @if($member->person_id == $group->leader_id)
                                        (<span class="card-text fw-bold">{{ $member->sex == "Homme" ? $group->type->leader_alias_m : $group->type->leader_alias_f }}</span>)
                                    @endif
                                    @isset( $member->place->prison )
                                        (<span class="card-text fw-bold">en prison</span>)
                                    @endisset
                                </span>
                                <br>
                                Âge : {{ $member->birth_date ? (Date::parse($member->birth_date)->age())." ans" : "N/A" }}
                                <br>
                                @isset( $member->sire_id )
                                {{ $member->sire->sex == "Homme" ? "Sire" : "Dame" }} : {{ $member->sire->first_name }} {{ $member->sire->last_name }}
                                @endisset
                            </p>
                        </div>
                        @if( $member->self_control )
                        <span class="position-absolute top-0 start-0 badge bg-success translate-middle-y mx-2">Maîtrise</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection