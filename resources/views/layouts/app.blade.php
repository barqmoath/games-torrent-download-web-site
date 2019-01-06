<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ Request::root() }}/master/css/base.css">
    <link rel="stylesheet" href="{{ Request::root() }}/master/css/vendor.css">
    <link rel="stylesheet" href="{{ Request::root() }}/master/css/main.css">
    @yield('css')

    <!-- script
    ================================================== -->
    <script src="{{ Request::root() }}/master/js/modernizr.js"></script>
    <script src="{{ Request::root() }}/master/js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ Request::root() }}/master/favicon.ico" type="image/x-icon">
    <link rel="icon" href="{{ Request::root() }}/master/favicon.ico" type="image/x-icon">
    <style media="screen">
    .masonry .entry__thumb-link::after {
        content: "Download";
        font-family: Segoe UI;
        font-size: 2rem;
      }
      .header__search-form input[type="search"] {
        color: #999999;
      }
    </style>

  </head>
  <body id="top">
    <div style="margin:0px; padding:0px;">
      @yield('header')
      @yield('content')
      @include('partials.footer')
      @include('partials.preloader')
    </div>
    <!-- Java Script
    ================================================== -->
    <script src="{{ Request::root() }}/master/js/jquery-3.2.1.min.js"></script>
    <script src="{{ Request::root() }}/master/js/plugins.js"></script>
    <script src="{{ Request::root() }}/master/js/main.js"></script>
    @yield('js')
  </body>
</html>
