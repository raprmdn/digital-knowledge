<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/imgs/theme/favicon.png') }}">
    <!-- Page Title  -->
    <title>{{ config('app.name') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dashlite.css?ver=2.2.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('backend/assets/css/theme.css?ver=2.2.0') }}">
    @yield('styles')
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            {{-- <!-- sidebar @s --> --}}
            <x-backend.layouts.sidebar></x-backend.layouts.sidebar>
            {{-- <!-- sidebar @e --> --}}
            <!-- wrap @s -->
            <div class="nk-wrap ">
                {{-- <!-- main header @s --> --}}
                @include('backend.layouts.main-header')
                {{-- <!-- main header @e --> --}}
                {{-- <!-- content @s --> --}}
                @yield('content')
                {{-- <!-- content @e --> --}}
                {{-- <!-- footer @s --> --}}
                @include('backend.layouts.footer')
                {{-- <!-- footer @e --> --}}
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('backend/assets/js/bundle.js?ver=2.2.0') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts.js?ver=2.2.0') }}"></script>
    @stack('scripts')
</body>

</html>