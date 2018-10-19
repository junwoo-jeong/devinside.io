<div class="PostCard">
    <a class="thumbnail-wrapper" href="posts/{{ $post['id'] }}">
      <img src="{{ $post['thumbnail'] }}"
        alt="{{ $post['title'] }}">
      <div class="white-mask"></div>
    </a>
    <div class="card-content">
      <a class="user-thumbnail-wrapper" href="/{{ '@'.$post['user']['name'] }}">
        <img src="{{ $post['user']['thumbnail'] }}"
          alt="{{ $post['user']['name'] }}">
      </a>
      <div class="content-head">
        <a class="username" href="/{{ '@'.$post['user']['name'] }}"> {{ $post['user']['name'] }} </a>
        <h3>
          <a href="posts/{{ $post['id'] }}">
            {{ $post['title'] }}
          </a>
        </h3>
        <div class="subinfo">
          <span>
            {{ $post['created_at'] }}
          </span>
          <span>
            5개의 댓글
          </span>
          <span>
          조회수 : {{ $post['hit'] }}
          </span>
        </div>
      </div>
      <div class="description" style="-webkit-box-orient: vertical;">{{ $post['content'] }}</div>
    </div>
  </div>