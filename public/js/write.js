var editor = new tui.Editor({
  el: document.getElementById('editSection'),
  initialEditType: 'markdown',
  previewStyle: 'vertical',
  // hooks: {
  //   'addImageBlobHook': function(blob, callback) {
  //     //blob 전송후 return Image URL을 callback 함수로 전달
  //     alert('asdasd');
  //     sendingBlob(blob, callback);
  //   }
  // }
});

function submit(post_id) {
  var title = document.getElementById('title_text').value;//$('#title_text')[0].value;
  var content = editor.getHtml();
  var url = '/posts' + (post_id ? '/'+post_id : '');
  alert(url);
  if(!title && !content) {
    alert("모두 입력하여 주십시오");
  }else {
    var data = new FormData();
    data.append('title', title);
    data.append('content', content);

    fetch(url, {
      method: 'POST',
      headers : {
        "X-CSRF-TOKEN": document.querySelector("meta[property='csrf']").getAttribute("content"),
      },
      redirect: 'follow',
      body: data,
    })
    .then(res => {
      alert('성공적으로 등록되었습니다.');
      location.href = '/';
    }).catch(err => {
      console.log(err);
    })
  }
}