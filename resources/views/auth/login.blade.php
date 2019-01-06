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
    <style media="screen">
       body {
         background-color: #1d2124;
         color: #EEE;

       }
      .login-screen {
        width: 400px;
        margin: 20px auto;
      }
      .has-error {
        border-color: #dc3545;
      }
    </style>
  </head>
  <body>
    <h1 class="text-center" style="font-size:7rem;">Login</h1>
    <div class="login-screen">
      <form class="" action="{{ route('login') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email" class="control-label">E-Mail Address</label>
            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                  <p style="color:#dc3545!important;">{{ $errors->first('email') }}</p>
                </span>
            @endif
        </div>

        <div class="form-group">
          <label for="password" class="control-label">Password</label>
          <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password" required autocomplete="new-password">
          @if ($errors->has('password'))
              <span class="help-block">
                <p style="color:#dc3545!important;">{{ $errors->first('password') }}</p>
              </span>
          @endif
        </div>

        <div class="form-group">
          <div class="checkbox">
              <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
              </label>
          </div>
        </div>

        <div class="form-group">
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
            </div>
        </div>

      </form>
    </div>
    <!-- JS -->
    <script type="text/javascript" src="{{ Request::root() }}/settings/js/jquery.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/settings/js/popper.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/settings/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/settings/js/ms.js"></script>
  </body>
</html>
