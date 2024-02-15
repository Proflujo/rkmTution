<!DOCTYPE html>
<html lang="en">

<head>
    @include('marketplace.layouts.header')
    @yield('header')
    @stack('styles')
</head>

<body>
    @hasSection('wrap-it')
        <div class="wrapper">

            <!-- Bootstrap row -->
            <div class="row">

                <!-- MAIN -->
                <div class="col">

                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                @hasSection('show-title')
                                    <!-- Content Header (Page header) -->
                                    <div class="content-header">
                                        <h4 class="text-muted">{{ $pageTitle }}</h4>
                                    </div>
                                    <!-- /.content-header -->
                                @endif
    @endif

    @yield('body')

    @hasSection('wrap-it')
        </div>
        <!-- /.content -->
        </section>
        </div>
        <!-- /.content-wrapper -->

        @hasSection('show-footer')
            <!-- /.content-footer -->
        @endif
        </div><!-- Main Col END -->

        </div><!-- body-row END -->

        </div>
        <!-- ./wrapper -->
    @endif
    @include('marketplace.layouts.footer')
    {{-- <div class="loadingoverlay" style="box-sizing: border-box; position: fixed; display: flex; flex-flow: column nowrap; align-items: center; justify-content: space-around; background: rgb(255, 255, 255) none repeat scroll 0% 0%; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 2147483647; opacity: 1;"><div class="loadingoverlay_element" style="order: 1; box-sizing: border-box; overflow: visible; flex: 0 0 auto; display: flex; justify-content: center; align-items: center; animation-name: loadingoverlay_animation__undefined; animation-timing-function: linear; animation-iteration-count: infinite; background-image: url(&quot;http://localhost:8000/admin/img/loading.gif&quot;); background-position: center center; background-repeat: no-repeat; background-size: cover; width: 200px; height: 200px;"></div></div> --}}
</body>

@include('marketplace.layouts.scripts')

<script type="text/javascript">
    var headers = {
        "Access-Control-Allow-Origin": "*"
    };

    @if (session()->has('authToken'))
        headers["Authorization"] = "Bearer {{ session()->get('authToken') }}";
    @endif

    $.ajaxSetup({
        headers: headers
    });
</script>

@stack('scripts')

</html>
