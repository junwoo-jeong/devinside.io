<form class="write_form">
    <div class="title_section">
      <a href="{{ route('home') }}">
        <i class="material-icons" style="font-size: 28px;">arrow_back</i>
      </a>
      <div class="title">
      <input type="text" id="title_text" value="{{ $post['title'] ?? '' }}" name="title" placeholder="제목을 입력하세요.">
      </div>
      <div class="button default" onclick="submit('{{$post['id'] ?? false }}')">작성하기</div>
    </div>
    <div id="editSection"></div>
</form>
<script src="{{ asset('js/write.js') }}"></script>
<script>
  var content = editor.convertor.toMarkdown(`{!! $post['content'] ?? '' !!}`);
  editor.setValue(content);
</script>