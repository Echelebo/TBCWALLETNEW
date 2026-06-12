
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{$settings->site_title}} - {{$settings->site_descr}}</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon"  href="/img/{{$settings->favicon}}" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <link rel="stylesheet" href="{{ asset('/vendor/translation/css/main.css') }}">
    <link href="/atlantis/fontawesome6/css/all.css" rel="stylesheet">
    <link href="/atlantis/fontawesome6/css/brands.css" rel="stylesheet">
    <link href="/atlantis/fontawesome6/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="/atlantis/css/fonts.min.css">

    <!-- CSS Files -->
    <link rel="stylesheet" href="/atlantis/css/bootstrap.min.css">
    <link rel="stylesheet" href="/atlantis/css/atlantis.min.css">
    <link rel="stylesheet" href="/atlantis/style.css">
    

    <!--   Core JS Files   -->
    <script src="/atlantis/js/core/jquery.3.2.1.min.js"></script>
    <script src="/atlantis/js/core/popper.min.js"></script>
    <script src="/atlantis/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/atlantis/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <script src="/atlantis/main.js"></script>

    
</head>
<body>
    
    <div class="wrapper bg-white">
        <div id="app">
            @include('translation::a_nav')

            @yield('body')

            @include('sweetalert::alert')
            
        </div>
    </div>
    
    <script src="/atlantis/main.js"></script>
    <script src="{{ asset('/vendor/translation/js/app.js') }}"></script>
</body>
</html>
