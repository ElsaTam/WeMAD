
<div class="col-lg-4">
    <div class="card card-block d-flex border-0 rounded-0 hover-invert" style="background-color:{{ $color }};color:white">
        <a class="stretched-link" href="{{ url('database/'.$link) }}"></a>
        <div class="card-body d-flex align-items-center justify-content-start ">
            <div class="col-12">
                <h2 class="border-bottom border-3 border-white py-3 fw-bold text-uppercase"><i class="{{ $icon }} me-2"></i> {{ $title }}</h2>
                <span class="fs-5" style="color: #ffffff;">{{ $subtitle }}<br></span>
            </div>
        </div>
    </div>
</div>