<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- fav icon -->

        <link rel="icon" type="image/x-icon" href="{{asset('/Logo1.gif') }}">
        
        <title>@yield('title')</title>

        <!-- Scripts -->
        <script>var baseUrl         = "{{url('')}}";</script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset(config('app.publicurl')) }}js/app.js"></script>
        <script src="https://d3js.org/d3.v7.min.js"></script>
        <script src="{{ asset('js/index.js')}}"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>        
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/ui-lightness/jquery-ui.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style type="text/css">
            .fa-close:before, .fa-times:before {
                content: "\f00d";
                color: red;
            }

            .navbar-nav li:hover > ul.dropdown-menu {
                display: block;
            }
            .dropdown-submenu {
                position:relative;
            }
            .dropdown-submenu > .dropdown-menu {
                top: 0;
                left: 100%;
                margin-top:-6px;
            }

            /* rotate caret on hover */
            .dropdown-menu > li > a:hover:after {
                text-decoration: underline;
                transform: rotate(-90deg);
            } 
     
            @yield('style')
        </style>

    </head>

    <body class="page-wrapper">

        @if(auth()->check())
            @include('layouts.menu')
        @endif

        <div class="mt-2">
            @include('layouts.message')
        <div>

        <main class="py-4">
            @yield('content')
        </main>          


    </body>

    @include('layouts.scripts')
    @yield('bottom-scripts')
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script type="text/javascript">
            $('.close').click(function() {
                $(this).parent().remove();
            });
        </script>
</html>
