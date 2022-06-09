<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
  </head>
  <body>

  @yield('container')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src={{ asset('js/jquery.js') }}></script>
    <script src={{ asset('js/popper.js') }}></script>
    <script src={{ asset('js/popper.min.js') }}></script>
    <script src={{ asset('bootstrap/js/bootstrap.bundle.min.js') }}></script>
  </body>
</html>
