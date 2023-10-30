<?php

use App\Custom\StringHelpers;

?>

@extends('layouts.app')


@section('content')

<h4 class="text-center">Fiche personnelle du prisonnier</h4>

<div class="d-flex gap-3 mb-3">
    <img src="{{ URL::asset($prisoner->featuredPhoto) }}" style="width: 250px; object-fit: cover;">
    <div class="d-flex flex-column gap-2">
        <h5 class="my-3">
            {{ $prisoner->title }} {{ $prisoner->first_last_name }}
        </h5>

        <div>
            <i class="fa-solid fa-location-pin me-2"></i>
            En prison : <a href="{{url($prisoner->place->link)}}">{{ $prisoner->place->fullname }}</a>
        </div>

        @if ($prisoner->is_hidden_creature)
            <div>
                <i class="fa-solid fa-users-between-lines me-2"></i>
                @if (isset($prisoner->group))
                    <a href="{{ url($prisoner->group->link) }}">{{ $prisoner->group->fullname }}</a>
                @else
                    <span class="bg-warning py-1 px-2">Renégat</span>
                @endif
            </div>
        @endif
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Charge</th>
                <th>Ville</th>
                <th>Date</th>
                <th>Disposition</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prisoner->prisonerRecord->crimes as $crime)
                <tr>
                    <td>{{ $crime->charge }}</td>
                    <td>{{ $crime->city }}</td>
                    <td>{{ $crime->date }}</td>
                    <td>{{ $crime->disposition }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include("people.inc.table-person-info", ["person" => $prisoner])

@if ($prisoner->type == "Vampire")
    @include("people.inc.vampire-tree", ["vampire" => $prisoner])
@endif

@endsection