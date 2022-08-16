@extends('layouts.app')


@section('content')

<div class="container bg-white p-3">

    <div class="card w-100 border-0 border-bottom rounded-0">
        <div class="hstack my-3">
            <div class="">
                <img src="{{ URL::asset('/storage/pictures/WeRealize.png') }}" class="img-fluid rounded-start" alt="[Union WeRealize]" width="250">
            </div>
            <div class="card-body">
                <h2 class="card-title">Union WeRealize</h2>
                <p class="card-text">Vous souhaitez utiliser votre véhicule en mission ? Pas de problème, on assure votre véhicule.</p>
                <p class="card-text">Vous souhaitez vous marriez ? Pas de problème, nous vous assurons notre soutiens pour l'organisation de votre mariage.</p>
                <p class="card-text">Vous voulez sauver les fées ? Nous vous donnerons les moyens de les aider.</p>
                <p class="card-text text-center text-danger fw-bold fs-4">Union WeRealize. Le syndicat des gens biens.</p>
                <div class="hstack">
                    <a href="#" class="btn btn-primary">Visiter</a>
                    <p class="card-text mx-auto">
                        <span class="fw-bold">Président</span> :<br>
                        Doyle Carter
                    </p>
                    <p class="card-text text-end">
                        Union WeRealize<br>
                        3200 S Las Vegas Blvd,<br>
                        Las Vegas, NV 89109, Etats-Unis<br>
                        +17027332008
                    </p>
                </div>
            </div>
          </div>
    </div>

</div>

@endsection