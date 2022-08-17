<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>WeMAD</title>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/94ce37b1d3.js" crossorigin="anonymous"></script>

        <!-- custom -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}"> <!-- include bootstrap -->
        <script src="{{asset('js/app.js')}}"></script>

        @yield('style')
    </head>

    <body>

        @isset($debug)
            <div class='bg-warning p-3'>
                <h5>DEBUG</h5>
                {{ $debug }}<br>
            </div>
        @endisset

        @include('inc.header')

        <div class="container bg-white p-0">
            @include('inc.navbar')
            
            @yield('sub-header')
            
            <div class="p-4">
                @yield('content')
            </div>
        </div>
        
        @yield('scripts')
        
    </body>
</html>