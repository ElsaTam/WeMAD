@extends('layouts.app')


@section('sub-header')
    @include('people.inc.wanteds-navbar')
@endsection



@section('content')

    <h3>{{$title}}</h3>
    <p>Note : la liste des <span class="text-lowercase">{{$title}}</span> est maintenue sur le site internet du WeMAD. Cette information peut être copiée et distribuée. Cependant, toute modification non autorisée de toute portion des affiches des <span class="text-lowercase">{{$title}}</span> du WeMAD constitue une violation de la loi fédérale (18 U.S.C., Section 709). Les personnes qui effectuent ou reproduisent ces modifications sont passibles de poursuites et, si reconnues coupables, seront passibles d'une amende ou d'une peine d'emprisonnement d'un an maximum, ou les deux.</p>

    @if(count($wanteds) > 0)
        <div class="row photo-gallery">
            @foreach($wanteds as $wanted)
                <!-- Gallery item -->
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="bg-white rounded shadow-sm">
                        <img src="{{ URL::asset($wanted->featuredPhoto) }}" alt="" class="img-fluid card-img-top">
                        <h5 class="p-2 text-center"> <a href="{{ url($wanted->link) }}" class="text-dark">{{$wanted->first_last_name}}</a></h5>
                    </div>
                </div>
                <!-- End -->
            @endforeach
        </div>
    @endif

@endsection