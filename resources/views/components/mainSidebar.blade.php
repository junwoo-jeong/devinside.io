<aside class="mainSidebar">
  <a class="logo" href="{{ route('home') }}">
    junwoo
    <div class="badge">blog</div>
  </a>
  <ul class="menu">
    <li class="menuItem {{ $sorting=='tranding' ? 'active' : '' }}">
      <a href="?sorting=tranding">
        <i class="material-icons">
          trending_up
        </i>
        <div class="text">
          트렌딩
        </div>
      </a>
    </li>
    <li class="menuItem {{$sorting=='recent' ? 'active' : ''}}">
      <a href="?sorting=recent">
        <i class="material-icons">
          update
        </i>
        <div class="text">
          최신 포스트
        </div>
      </a>
    </li>
    <li class="menuItem {{$sorting=='tag' ? 'active' : ''}}">
      <a href="?sorting=tag">
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