@extends('layouts.app')


@section('sub-header')
    
@endsection




@section('content')

    <div class="p-4">
        <h2 class="text-center mb-4">{{ $country->name }}</h2>

        <h4 class="text-center mb-3">Organisations</h4>

        <div class="row row-cols-auto g-4" data-masonry='{"percentPosition": true }'>
            @foreach($country->organisations as $organisation)
            <div class="col-sm-4">
                @include("ressources.in-the-world.pages.inc.organisation-card", ["organisation" => $organisation])
            </div>
            @endforeach
        </div>
    </div>

@endsection


@section('scripts')
<script src="{{asset('js/masonry/masonry.pkgd.min.js')}}" async></script>
@endsection