@extends('layouts.app')



@section('sub-header')
<div class="bg-white py-2">
    <h1 class="text-center">Recherches sur les drogues</h1>
</div>
@endsection




@section('content')

<div class="container py-4">
    @include("ressources.inc.page-card", ["title" => "Rapport — Surnaturel dans le traffic de drogues", "link" => "on-drugs/drug-report", "type" => "report"])
</div>

@endsection