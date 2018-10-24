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
  @if ($sorting == 'trending')
    <div class="TrendingTemplate"><h1>지금 뜨고 있는 포스트</h1>
      <div class="PostCardList">
        @foreach ($posts as $post)
          @component('components.postCard', ['post'=>$post])
          @endcomponent
        @endforeach
      </div>
  @elseif ($sorting == 'recent')
    <div class="TrendingTemplate"><h1>지금 최신의 포스트</h1>
      <div class="PostCardList">
        @foreach ($posts as $post)
          @component('components.postCard', ['post'=>$post])
          @endcomponent
        @endforeach
      </div>
  @elseif ($sorting == 'tags')
    <div class="TagsTemplate">
      <div class="TagsTab">
        <a href="/tags?sort=trending" class="active">
          <i class="material-icons">
            trending_up
          </i>
          인기순
        </a>
        <a href="/tags?sort=name" class="">
          <i class="material-icons">
            sort_by_alpha
          </i>
          이름순
        </a>
      </div>
      <div class="TagItemList">
        @foreach ($tags as $tag)
          <a class="TagItem" href="{{'/tags/'.$tag['tag']['name']}}">
            <div class="name">{{$tag['tag']['name']}}</div>
            <div class="counts">{{$tag['num']}}</div>
          </a>
        @endforeach
      </div>
  @else
    <div class="TagsTemplate">
      <div class="TagCurrent">
        <a href="/tags" class="backwards-btn">전체태그 보기</a>
        <hr />
        <h2>
          #{{$tag}}
        <span class="lighten">({{count($posts)}}개의 포스트)</span>
      </h2>
      </div>
      <div class="PostCardList">
        @foreach ($posts as $post)
          @component('components.postCard', ['post'=>$post['post']])
          @endcomponent
        @endforeach
      </div>
    </div>
  @endif
  
@endsection