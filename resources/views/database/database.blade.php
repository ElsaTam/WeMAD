@extends('layouts.app')



@section('sub-header')
<div class="bg-white py-2 mt-3">
    <h1 class="text-center">Bases de données</h1>
</div>
@endsection


@section('content')

<div class="row container mx-auto px-0 py-4">
    @include("database.inc.category-card", ["title" => "Personnes", "subtitle" => "Rechercher des individus connus dans les fichiers du WeMAD", "link" => "people/", "color" => "#3d77b0", "icon" => "fa-solid fa-user"])
    @include("database.inc.category-card", ["title" => "Saisies", "subtitle" => "Tous les objets, substances ou autres saisis par le WeMAD", "link" => "seizure/", "color" => "#826076", "icon" => "fa-solid fa-box-open"])
</div>

@endsection