@extends('layouts.editor')

@section('head')
  <link rel="stylesheet" href="{{ asset('css/layouts/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection

@section('mainHead')
  <div class="headerSection">
    <div class="headerMenu">
      <a href="/" class="logo">devinside</a>
      <div class="right">
        @guest
        <a href="{{ route('login') }}" class="button outline">로그인</a>
        @else
        <div class="userButton" onclick="userButton()">
          <div class="thumbnail">
            <img src="{{ Auth::user()->thumbnail }}" alt="thumbnail" />
          </div>
        </div>
        <div class="user-menu-wrapper" style="display: none;">
          <div class="user-menu-positioner">
            <div class="rotated-square"></div>
            <div class="user-menu">
              <div class="menu-items">
                <a class="user-menu-item" href="/#">내 벨로그</a>
                <div class="separator"></div>
              <a class="user-menu-item" href="{{ route('posts.create') }}">새 글 작성</a>
                <a class="user-menu-item" href="/#">임시 글</a>
                <div class="separator"></div>
                <a class="user-menu-item" href="/settings">설정</a>
                <a class="user-menu-item" 
                  href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">로그아웃</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </div>
          </div>
        </div>
        @endguest
      </div>
    </div>
  </div>
  <script src=""></script>
@endsection

@section('viewForm')
  @component('components.postView', [
    'post'=>$post,
    'post_tags'=>$post_tags
  ])
      
  @endcomponent
@endsection