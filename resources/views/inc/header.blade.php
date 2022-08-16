<header class="bg-white shadow border-bottom border-dark border-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <img class="m-2" src="{{ URL::asset('/storage/pictures/icons/logo_wemad.png') }}" height="100">
                <div class="text-uppercase fs-5">
                    <div><span class="text-decoration-underline">We</span>ird and </div>
                    <div><span class="text-decoration-underline">M</span>agical <span class="text-decoration-underline">A</span>ffairs </div>
                    <div><span class="text-decoration-underline">D</span>epartment</div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center text-uppercase shadow">
                Gardiens du Monde Caché,<br>
                Protégeons et servons.
            </div>
            <div class="col-md-4 d-flex flex-column gap-3 justify-content-center align-items-end">
                <a class="text-decoration-none fs-5" href="{{ url('user/') }}">Mon espace <i class="fa-solid fa-user ms-1"></i></a>
                <form class="d-flex input-group">
                    <input class="form-control rounded-0 bg-light" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn rounded-0 border border-1 p-1" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </div>
</header>