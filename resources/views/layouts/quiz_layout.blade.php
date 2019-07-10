<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" href="{{asset('/images/logo/favicon.ico')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Quiz</title>
    <!-- Styles -->
    @yield('head')
</head>
<body>
  <div id="app">
      @yield('top_bar')
      @yield('content')
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('script_clock')
  @yield('scripts')
</body>
</html>
