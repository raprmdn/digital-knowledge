<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.png') }}">
    <!-- NewsBoard CSS  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/widgets.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    @yield('styles')
</head>

<body>
    <div class="scroll-progress primary-bg"></div>
    <!-- Start Preloader -->
    <div class="preloader text-center">
        <div class="circle"></div>
    </div>
    {{-- <!--Offcanvas sidebar--> --}}
    @include('frontend.layouts.canvas-sidebar')

    {{-- <!-- Start Header --> --}}
    <x-front.layouts.header></x-front.layouts.header>

    <!--Start search form-->
    @include('frontend.layouts.search')
    
    {{-- <!-- Start Main content --> --}}
    @yield('content')
    {{-- <!-- End Main content --> --}}

    {{-- <!--site-bottom--> --}}
    {{-- @include('frontend.layouts.site-bottom') --}}
    {{-- <!--end site-bottom--> --}}
    
    {{-- <!-- Footer Start--> --}}
    @include('frontend.layouts.footer')
    {{-- <!-- End Footer --> --}}
    <div class="dark-mark"></div>

    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.ticker.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.theia.sticky.js') }}"></script>
    <!-- NewsBoard JS -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
