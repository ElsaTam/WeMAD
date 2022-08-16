@extends('layouts.app')



@section('sub-header')
<div class="bg-white py-2">
    <h1 class="text-center">Approche scientifique du surnaturel</h1>
</div>
@endsection




@section('content')

<div class="container py-4">
    @include("ressources.inc.page-card", ["title" => "Recherches — La jökullite : un minéral perturbant la magie démoniaque", "link" => "on-sciences/jokullite", "type" => "research"])
</div>

@endsection