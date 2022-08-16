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
                <div class="list-group list-striped rounded-0 shadow">
                @foreach($council_west as $office)
                    <a class="list-group-item list-group-item-action" href="{{ url('offices/'.$office->id) }}">
                        {{ $office->state->id }}, {{ $office->name }}
                    </a>
                @endforeach
                </div>
            </div>
        @endif
        
        @if(count($council_center) > 0)
            <div class="col-sm-3">
                <h4 class="text-center">Etats du Centre</h4>
                <div class="list-group list-striped rounded-0 shadow">
                @foreach($council_center as $office)
                    <a class="list-group-item list-group-item-action" href="{{ url('offices/'.$office->id) }}">{{ $office->state->id }}, {{ $office->name }}</a>
                @endforeach
                </div>
            </div>
        @endif
        
        @if(count($council_est) > 0)
            <div class="col-sm-3">
                <h4 class="text-center">Etats de l'Est</h4>
                <div class="list-group list-striped rounded-0 shadow">
                @foreach($council_est as $office)
                    <a class="list-group-item list-group-item-action" href="{{ url('offices/'.$office->id) }}">{{ $office->state->id }}, {{ $office->name }}</a>
                @endforeach
                </div>
            </div>
        @endif
        
        @if(count($council_none) > 0)
            <div class="col-sm-3">
                <h4 class="text-center">Sans conseil</h4>
                <div class="list-group list-striped rounded-0 shadow">
                @foreach($council_none as $office)
                    <a class="list-group-item list-group-item-action" href="{{ url('offices/'.$office->id) }}">{{ $office->state->id }}, {{ $office->name }}</a>
                @endforeach
                </div>
            </div>
        @endif
    </div>

@endsection

@section('scripts')
<script src="{{asset('js/simplemaps/mapdata.js')}}"></script>
<script src="{{asset('js/simplemaps/usmap.js')}}"></script>
@endsection