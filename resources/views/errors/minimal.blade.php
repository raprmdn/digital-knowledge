<html lang="en">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/imgs/theme/favicon.png') }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dashlite.css?ver=2.2.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('backend/assets/css/theme.css?ver=2.2.0') }}">
</head>

<body class="nk-body bg-white npc-default pg-error">
<div class="nk-app-root">
    <div class="nk-main ">
        <div class="nk-wrap nk-wrap-nosidebar">
            <div class="nk-content ">
                <div class="nk-block nk-block-middle wide-xs mx-auto">
                    <div class="nk-block-content nk-error-ld text-center">
                        <h1 class="nk-error-head">@yield('code')</h1>
                        <h3 class="nk-error-title">@yield('h1')</h3>
                        <p class="nk-error-text">@yield('message')</p>
                        <a href="/" class="btn btn-lg btn-primary mt-2">Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('backend/assets/js/bundle.js?ver=2.2.0') }}"></script>
<script src="{{ asset('backend/assets/js/scripts.js?ver=2.2.0') }}"></script>

</html>
