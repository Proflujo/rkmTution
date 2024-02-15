<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>{{ $title }}</title>

<!-- FAVICONS ICON -->
{{-- <link rel="icon" href="images/favicon.ico" type="image/x-icon" /> --}}
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('home/images/favicon.png') }}" />

<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">


<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- FAVICONS ICON -->
{{-- <link rel="icon" href="images/favicon.ico" type="image/x-icon" /> --}}
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('home/images/favicon.png') }}" />

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css"rel="stylesheet" />

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css"rel="stylesheet" />
{{-- Material icons --}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

<link rel="stylesheet" href="{{ asset('css/material-kit.css') }}">
<link rel="stylesheet" href="{{ asset('css/material-kit.css.map') }}">
<link rel="stylesheet" href="{{ asset('css/material-kit.min.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('marketplace/css/nucleo-icons.css') }}">
<link rel="stylesheet" href="{{ asset('marketplace/css/nucleo-svg.css') }}"> --}} -->


<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div cass="col-12">
            <nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid px-0">
                    <a class="navbar-brand font-weight-bolder ms-sm-3" target="_blank">
                        <img src="{{ asset('/Logo1.gif') }}" style="height: 3rem">
                    </a>    
                    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">         
                         
                    </div>
                    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100">
                        <i class="material-icons align-items-center opacity-6 me-2 text-md">home</i>
                        <a href="{{ url('/')}}" class="align-items-center border-radius-md me-3">
                            <span>Home</span>
                        </a>
                        <i class="material-icons align-items-center opacity-6 me-2 text-md">tv</i>
                        <a href="{{ url('/')}}" class="align-items-center border-radius-md me-3">
                            <span>About Us</span>
                        </a>
                        <i class="material-icons align-items-center opacity-6 me-2 text-md">dashboard</i>
                        <a href="{{ url('/')}}" class="align-items-center border-radius-md me-4">
                            <span>Contact Us</span>
                        </a>
                        <div class="pt-3 me-5">
                            <a href="{{ url('/login')}}" class="align-items-center border-radius-lg me-4">
                                <span class="btn btn-primary"><i class="me-2 material-icons opacity-6 text-lg">login</i>Login</span>
                            </a> 
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

@section('header')
    <div class="page-header min-vh-70 relative"
        style="background-color: #FAD961;background-image: linear-gradient(90deg, #F76B1C 20%, #FAD961 100%);">

        <div class="row">

            <div class="offset-lg-4 col-lg-12">
                <div class="text-center">
                    <h2 style="color: white;">Annai Saradha Tution Centre !<br></h2>
                    <button id="exploreBtn" style="color: white;" type="button" class="btn bg-success btn-rounded">
                        Explore
                        <i class="fa fa-circle-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="col-lg-6" style="position: absolute;right: -3%;top: -9%;">
                <img src="images/home-bg.svg" style="width:80%">
            </div>
        </div>
    </div>
@endsection