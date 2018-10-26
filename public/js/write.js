var editor = new tui.Editor({
  el: document.getElementById('editSection'),
  initialEditType: 'markdown',
  previewStyle: 'vertical',
  hooks: {
    'addImageBlobHook': function(blob, callback) {
      //blob 전송후 return Image URL을 callback 함수로 전달
      sendingBlob(blob, callback);
    }
  }
});
var eee ;
function sendingBlob(blob, callback) {
  var data = new FormData();
  data.append('img', blob);
  console.log(data.get('img'));
  
  fetch('/imgUpload', {
    method: 'POST',
    headers : {
      "X-CSRF-TOKEN": document.querySelector("meta[property='csrf']").getAttribute("content"),
    },
    body: data,
  })
  .then(res => {
    var _callback = callback;
    res.text().then(url => _callback(url));
  }).catch(err => {
    console.log(err);
  })
}
function submit() {
  var submitBox = document.getElementsByClassName('SubmitBox')[0];
  if (submitBox.style.display === 'none') {
    submitBox.classList.remove('disappear');
    submitBox.classList.add('appear');
    submitBox.style.display = '';
    
  }else {
    submitBox.classList.remove('appear');
    submitBox.classList.add('disappear');
    setTimeout(() => {
      submitBox.style.display = 'none';
    }, 150);
  }
}
