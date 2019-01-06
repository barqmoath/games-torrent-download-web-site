<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ Request::root() }}/settings/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ Request::root() }}/settings/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ Request::root() }}/settings/css/ms.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ route('settings.index') }}">Games Torrent Settings</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('games.upload') }}"> <i class="fa fa-plus"></i> New Game </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('settings.platform') }}"> <i class="fa fa-laptop"></i> Platforms </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('settings.categories') }}"> <i class="fa fa-bars"></i> Categories </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('games.index') }}"> <i class="fa fa-gamepad"></i> Games </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('settings.users') }}"> <i class="fa fa-users"></i> Users </a>
            </li>
          </ul>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-circle-o"></i> {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('users.profile') }}">Profile</a>
                <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();" href="#">Logout</a>
                <form id="logoutForm" action="/logout" method="POST" style="display: none;">{{ csrf_field() }}</form>
              </div>
            </li>
          </ul>

        </div>
      </div>
    </nav>

    <!-- Alerts -->
    <div class="container">
      <!-- Alerts Success -->
      @if(session('msg'))
      <div class="alert alert-success alert-dismissible text-center" style="font-size:1.2rem;" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-remove"></i></button>
        {{ session('msg') }}
      </div>
      @endif
    </div>
    <!-- Errors Messages -->
    @if(count($errors) > 0)
    <div class="alert alert-danger  alert-dismissible text-center" style="font-size:1.2rem;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-remove"></i></button>
      @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
    @endif
    <!-- Errors Messages End -->
    <!-- Alerts End -->
    @yield('content')
    <!-- JS -->
    <script type="text/javascript" src="{{ Request::root() }}/settings/js/jquery.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/settings/js/popper.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/settings/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/settings/js/ms.js"></script>
  </body>
</html>
