ClassicEditor
  .create(document.querySelector('#editor'))
  .then(editor => {
    window.editor = editor;

    document.querySelector('#ckeditorForm').addEventListener('submit', function () {
      document.querySelector('#content').value = editor.getData();
    });
  })
  .catch(error => {
    console.error(error);
  });