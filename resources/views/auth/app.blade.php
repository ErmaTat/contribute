
<!doctype html>
<html lang="en" data-bs-theme="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/favicon/favicon.ico')}}" type="image/x-icon">
    
    <!-- Map CSS -->
    <link rel="stylesheet" href="mapbox-gl-js/v0.53.0/mapbox-gl.css">
    
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/libs.bundle.css')}}">
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.bundle.css')}}">
    
    <style>body { display: none; }</style>
    
    <!-- Title -->
    <title>@yield('title')</title>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="{{ asset('gtag/js?id=UA-156446909-1')}}"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag("js", new Date());gtag("config", "UA-156446909-1");</script>
  </head>
  <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->
    <div class="container">
      @yield('content')
    </div> <!-- / .container -->

    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='{{ asset('mapbox-gl-js/v0.53.0/mapbox-gl.js')}}'></script>
    
    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendor.bundle.js')}}"></script>
    
    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.bundle.js')}}"></script>

  </body>
</html>
