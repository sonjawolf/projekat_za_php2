<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title') Website Template by Colorlib</title>
        @yield('meta')
        <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/')}}fonts/icomoon/style.css">
        <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('/')}}css/jquery-ui.css">
        <link rel="stylesheet" href="{{asset('/')}}css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{asset('/')}}css/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{asset('/')}}css/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{asset('/')}}css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="{{asset('/')}}css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="{{asset('/')}}fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="{{asset('/')}}css/aos.css">
        <link href="{{asset('/')}}css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('/')}}css/style.css">
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="site-wrap">
            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>
            @include('components.adminNav')
            <div class="site-section">
            @include('components.success')
            @include('components.error')
                <div class="container">
                    <div class="row">
                        @yield('center')
                    </div>
                </div>
            </div>
            <!-- END section -->
            @include('components.footer')
            @section('scripts')
            @show
        </div>
        <!-- .site-wrap -->
        <!-- loader -->
        @include('components.loader')
        <script type="text/javascript">
      const baseUrl = '{{ route("home") }}';
      const token = '{{ csrf_token() }}';
    </script>
     <script src="{{asset('/')}}js/ajax.js"></script>
    </body>
</html>