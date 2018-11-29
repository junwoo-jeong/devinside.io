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
    @if ($post['user']['name'] == (Auth::user()->name ?? ''))
    <div class="postAction">
      <a class="btn" href="{{'/write?edit_id=' . $post['id'] }}">수정</a>
      <a class="btn" href="{{'/posts/'.$post['id'].'/delete'}}">삭제</a>
    </div>
    @endif
  </div>
  <div id="editSection"></div>
  <div class="PostTags">
    @foreach ($post_tags as $post_tag)
      <a href="/tags/{{$post_tag['tag']['name']}}">{{$post_tag['tag']['name']}}</a>
    @endforeach
  </div>
  <div class="commentSection">
    <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://devinside-xyz.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
  </div>
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
