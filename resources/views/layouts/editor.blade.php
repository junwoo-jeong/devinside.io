<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" property="csrf" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/layouts/layout.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tools/button.css') }}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   <!-- Scripts -->
   <script src="{{ asset('js/main.js') }}"></script>
   
  <!-- Toast UI Editor -->
  {{-- <script src="{{ asset('bower_components/jquery/dist/jquery.js') }}"></script> --}}
  <script src="{{ asset('bower_components/tui-code-snippet/dist/tui-code-snippet.js') }}"></script>
  <script src="{{ asset('bower_components/markdown-it/dist/markdown-it.js') }}"></script>
  <script src="{{ asset('bower_components/to-mark/dist/to-mark.js') }}"></script>
  <script src="{{ asset('bower_components/codemirror/lib/codemirror.js') }}"></script>
  <script src="{{ asset('bower_components/highlightjs/highlight.pack.js') }}"></script>
  <script src="{{ asset('bower_components/squire-rte/build/squire-raw.js') }}"></script>
  <script src="{{ asset('bower_components/tui-editor/dist/tui-editor-Editor.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('bower_components/codemirror/lib/codemirror.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/highlightjs/styles/github.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/tui-editor/dist/tui-editor.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/tui-editor/dist/tui-editor-contents.css') }}">
  
  <!-- add -->
  @yield('head')
</head>
<body>
    @yield('writeForm')
  <div class="postTamplate">
  @yield('mainHead')
  @yield('viewForm')     
  </div>
</body>
</html>