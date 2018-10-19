<div class="postSection">
  <div class="postHead">
    <div class="userInfo">
      <a href="/{{ '@'.$post['user']['name'] }}" class="user-thumbnail">
        <img src="{{ $post['user']['thumbnail'] }}" alt="thumbnail" />
      </a>
      <div class="info">
        <a href="#" class="username">{{ $post['user']['name'] }}</a>
        <div class="description">asdasdasd</div>
      </div>
    </div>
    <h1>{{ $post['title'] }}</h1>
    <div class="date-and-likes">
      <div class="date">{{ $post['created_at'] }}</div>
      <div class="placeholder"></div>
      <div class="date">조회수 : {{ $post['hit'] }}</div>
    </div>
    <div class="separator"></div>
    @if ($post['user']['name'] == Auth::user()->name)
    <div class="postAction">
      <a class="btn" href="{{'/write?edit_id=' . $post['id'] }}">수정</a>
      <a class="btn" href="">삭제</a>
    </div>
    @endif
  </div>
  <div id="editSection"></div>
  <div class="tagSection">태그 섹션</div>
  <div class="commentSection">코멘트 섹션</div>
</div>
<script>
  var editor = new tui.Editor.factory({
  el: document.querySelector('#editSection'),
  height: '300px',
  viewer: true
  });
  var content = editor.convertor.toMarkdown(`{!! $post['content'] ?? '' !!}`);
  editor.setValue(content);
</script>
