@extends('layouts.app')



@section('sub-header')
<div class="bg-white py-2 mt-3">
    <h1 class="text-center">Ressources</h1>
</div>
@endsection




@section('content')

<div class="row container mx-auto px-0 py-4">
    @include("ressources.inc.category-card", ["title" => "Drogues", "subtitle" => "Recherches sur les drogues", "link" => "on-drugs/", "color" => "#2d9e81"])
    @include("ressources.inc.category-card", ["title" => "Sciences", "subtitle" => "Approche scientifique du surnaturel", "link" => "on-sciences/", "color" => "#807363"])
    @include("ressources.inc.category-card", ["title" => "Dans le monde", "subtitle" => "Le Plan Terrestre dans son ensemble", "link" => "in-the-world/", "color" => "#894889"])
</div>

@endsection