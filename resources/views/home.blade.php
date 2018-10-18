@extends('layouts.main')

@section('mainSidebar')
  @component('components.mainSidebar', ['sorting'=>$sorting])

  @endcomponent
@endsection
@section('mainHead')
  @component('components.mainHead')
    
  @endcomponent
@endsection
@section('postTemplate')
  @if ($sorting == 'tranding')
    <div class="TrendingTemplate"><h1>지금 뜨고 있는 포스트</h1>
  @else
    <div class="TrendingTemplate"><h1>지금 최신의 포스트</h1>
  @endif
  <div class="PostCardList">
    @foreach ($posts as $post)
      @component('components.postCard', ['post'=>$post])
      @endcomponent
    @endforeach
  </div>
@endsection