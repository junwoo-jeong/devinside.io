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
