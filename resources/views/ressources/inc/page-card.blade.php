<div class="card bg-light border-0 mb-4">
    <div class="hstack g-0">
        <div class="m-2 p-3 rounded-circle">
            <img src="{{ URL::asset('/storage/pictures/icons/'.$type.'.png') }}" class="img-fluid rounded-start" alt="" width=30>
        </div>
        <div class="">
            <div class="card-body">
                <h5 class="card-title"><a class="stretched-link text-reset text-decoration-none" href="{{ url('ressources/'.$link) }}">{{ __('database.'.$type) }} - {{ $title }}</a></h5>
                @isset($excerpt)
                    <p class="card-text">{{ $excerpt }}</p>
                @endisset
            </div>
        </div>
    </div>
</div>
