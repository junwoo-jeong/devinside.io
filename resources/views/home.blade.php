@extends('layouts.main')

@section('mainSidebar')
  @component('components.mainSidebar', ['sorting'=>$sorting])

  @endcomponent
@endsection
@section('mainHead')
  @component('components.mainHead')
    
  @endcomponent
@endsection