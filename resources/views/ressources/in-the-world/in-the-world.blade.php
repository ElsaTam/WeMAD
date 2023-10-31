@extends('layouts.app')



@section('sub-header')
<div class="bg-white py-2">
    <h1 class="text-center">Le Plan Terrestre dans son ensemble</h1>
</div>
@endsection




@section('content')

<div class="container py-4">
    @include("ressources.inc.page-card", ["title" => "Liste - Agences et organisations du Monde Caché", "link" => "in-the-world/organisations", "type" => "list"])
</div>

@endsection