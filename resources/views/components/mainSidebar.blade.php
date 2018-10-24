<aside class="mainSidebar">
  <a class="logo" href="{{ route('home') }}">
    devinside
    <div class="badge">beta</div>
  </a>
  <ul class="menu">
    <li class="menuItem {{ $sorting=='trending' ? 'active' : '' }}">
      <a href="{{route('trending')}}">
        <i class="material-icons">
          trending_up
        </i>
        <div class="text">
          트렌딩
        </div>
      </a>
    </li>
    <li class="menuItem {{$sorting=='recent' ? 'active' : ''}}">
      <a href="{{route('recent')}}">
        <i class="material-icons">
          update
        </i>
        <div class="text">
          최신 포스트
        </div>
      </a>
    </li>
    <li class="menuItem {{$sorting=='tags' ? 'active' : ''}}">
      <a href="{{route('tags')}}">
        <i class="material-icons">
          label
        </i>
        <div class="text">
          태그
        </div>
      </a>
    </li>
  </ul>
</aside>