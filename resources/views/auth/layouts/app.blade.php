<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    {{-- <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}"> --}}
    <link rel="shortcut icon" href="{{ asset('frontend/assets/imgs/theme/favicon.png') }}">
    <!-- Page Title  -->
    <title>{{ config('app.name') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dashlite.css?ver=2.2.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('backend/assets/css/theme.css?ver=2.2.0') }}">
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        {{-- <!-- main @s --> --}}
        <div class="nk-main ">
            {{-- <!-- wrap @s --> --}}
            <div class="nk-wrap nk-wrap-nosidebar">
                {{-- <!-- content @s --> --}}
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="/" class="logo-link">
                                <h3><strong>{{ config('app.name') }}</strong></h3>
                            </a>
                        </div>
                       @yield('content')
                    </div>
                </div>
                {{-- <!-- wrap @e --> --}}
            </div>
            {{-- <!-- content @e --> --}}
        </div>
        {{-- <!-- main @e --> --}}
    </div>
    {{-- <!-- app-root @e --> --}}
    <!-- JavaScript -->
    <script src="{{ asset('backend/assets/js/bundle.js?ver=2.2.0') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts.js?ver=2.2.0') }}"></script>

</html>
