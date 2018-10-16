<div class="mainHead">
  <div class="button-area">
    <a href="{{ route('write') }}" class="button default">새 포스트 작성</a>
  </div>
  <div class="spacer"></div>
  <div class="rignt-area">
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
          <a class="user-menu-item" href="{{ route('write') }}">새 글 작성</a>
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