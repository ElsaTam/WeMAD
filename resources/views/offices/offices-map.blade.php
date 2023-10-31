@extends('layouts.app')


@section('sub-header')
    @include('offices.inc.offices-navbar')
@endsection



@section('content')

    <div class="w-75 mx-auto my-5" id="offices-map"></div>

    <div class="row">
        @if(count($council_west) > 0)
            <div class="col-sm-3">
                <h4 class="text-center">Etats de l'Ouest</h4>
                @include("offices.inc.offices-list", ["offices" => $council_west])
            </div>
        @endif
        
        @if(count($council_center) > 0)
            <div class="col-sm-3">
                <h4 class="text-center">Etats du Centre</h4>
                @include("offices.inc.offices-list", ["offices" => $council_center])
            </div>
        @endif
        
        @if(count($council_est) > 0)
            <div class="col-sm-3">
                <h4 class="text-center">Etats de l'Est</h4>
                @include("offices.inc.offices-list", ["offices" => $council_est])
            </div>
        @endif
        
        @if(count($council_none) > 0)
            <div class="col-sm-3">
                <h4 class="text-center">Sans conseil</h4>
                @include("offices.inc.offices-list", ["offices" => $council_none])
            </div>
        @endif
    </div>

@endsection

@section('scripts')
<script src="{{asset('js/simplemaps/usoffices_mapdata.js')}}"></script>
<script src="{{asset('js/simplemaps/usoffices_map.js')}}"></script>
@endsection