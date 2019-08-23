<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/brasaoPalmeira.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-sm navbar-light bg-success shadow-sm ">
            <div class="container">
                
                <a class="navbar-brand text-white" href="{{ url('/') }}" style="font-size: 16px;">
                <img src="{{ asset('img/brasaoPalmeira.png') }}" style="height: 35px; margin-top: -10px; margin-bottom: -10px; margin-left: 0px; margin-right: 10px;">

                    {{ config('app.name', '') }}
                </a>

            </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/') }}">Inscrição</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="{{ route('consulta') }}">Consulta</a>
                </li>
            </ul>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>