<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/main.js') }}"></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

   <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/layouts/layout.css') }}">
  <link rel="stylesheet" href="{{ asset('css/layouts/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tools/button.css') }}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
  <div class="wrapper">
    <div class="mainTemplate">
      @yield('mainSidebar')
      @yield('mainHead')
      @yield('postTemplate')
    </div>
  </div>
</body>