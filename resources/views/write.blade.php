@extends('layouts.editor')

@section('head')
  <link rel="stylesheet" href="{{ asset('css/write.css') }}">
  <link rel="stylesheet" href="{{ asset('css/components/submitBox.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tools/inputButton.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tools/inputTag.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tools/scrollbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tools/writeThumbnail.css') }}">
@endsection
@section('writeForm')
  @component('components.writeForm', ['post'=>$post ?? ''])
  @endcomponent  
  @component('components.submitBox')
      
  @endcomponent
@endsection

