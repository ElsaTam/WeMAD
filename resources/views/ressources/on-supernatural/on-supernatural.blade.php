@extends('layouts.app')



@section('sub-header')
<div class="bg-white py-2">
    <h1 class="text-center">Approche scientifique du surnaturel</h1>
</div>
@endsection




@section('content')

<div class="container py-4">
    @include("ressources.inc.page-card", ["title" => "La jökullite : un minéral perturbant la magie démoniaque", "link" => "on-supernatural/jokullite", "type" => "research"])
    @include("ressources.inc.page-card", ["title" => "L'Abzu, le domaine du monde des esprits", "link" => "on-supernatural/abzu", "type" => "report"])
</div>

@endsection