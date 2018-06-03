<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="skadevz">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
  </head>

  <body>
    <div id="wrapper">
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-database fa-fw"></i> {{ config('app.name') }}</a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
          <li>
            <a href="#">
              <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }}
            </a>
          </li>
          <li>
            <a href="{{ route('logout') }}">
              <i class="fa fa-sign-out fa-fw"></i> Keluar
            </a>
          </li>
        </ul>

        @include('layouts.sidenav')
      </nav>
      <div id="page-wrapper">
        @yield('content')
      </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    @include('sweet::alert')
    <script>
    $('[data-toggle=tooltip]').tooltip()
    </script>
  </body>
</html>
