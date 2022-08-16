@extends('layouts.app')


@section('sub-header')

<div class="position-relative bg-dark mt-3 overflow-hidden" style="height: 350px;">

    <img src="{{ URL::asset('/storage/pictures/USA-network.png') }}" class="position-absolute top-50 translate-middle-y" style="width: 60%; left: -50px; filter: invert(1) brightness(1.75);;">

    <img src="{{ URL::asset('/storage/pictures/icons/logo_wemad_white_notext.png') }}" class="position-absolute top-50 translate-middle-y" style="height: 110%; left: -40px;">

    <h1 class="position-absolute top-50 translate-middle-y text-white" style="right: 20%; font-size: 5em;">
        WeMAD
    </h1>

</div>

@endsection


@section('content')

<div class="row">

    <div class="col-9">

        <div class="position-relative">
            <img src="{{ URL::asset('/storage/pictures/hunter-talking-to-civilian.jpg') }}" style="width: 100%; height: 300px; object-fit: cover; object-position: 0 -10px;">
            <div class="position-absolute top-50 translate-middle-y rounded ms-3 p-3 fs-4 fw-bold shadow" style="width: 25%; min-width: 235px; background-color: #394b7583; color: white;">
                Nous protégeons les citoyens humains et du Monde Caché et défendons les Tomes de l'Equilibre.
            </div>
        </div>

        @include('database.inc.search-people')
    </div>

    <div class="col-3">

        <!-- TOOLS -->
        <div class="border p-2 border-dark">
            <h4><i class="fa-regular fa-lightbulb"></i> J'ai besoin de</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="#">Remplir un rapport</a></li>
                <li class="list-group-item"><a href="#">Consulter ma fiche de paie</a></li>
                <li class="list-group-item"><a href="#">Consulter mon dossier médical</a></li>
                <li class="list-group-item"><a href="#">Demander une formation</a></li>
                <li class="list-group-item"><a href="#">Déclarer des congés</a></li>
                <li class="list-group-item"><a href="#">Prendre un rdv psychologue</a></li>
            </ul>
        </div>
    </div>

</div>


@endsection


@section('scripts')

@endsection