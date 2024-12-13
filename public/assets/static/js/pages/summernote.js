$("#summernote").summernote({
  tabsize: 2,
  height: 500,
})

$('#form').on('submit', function(e) {
  e.preventDefault(); // Prevent default form submission
  var content = $('#summernote').summernote('code'); // Get Summernote content
  $('#content').val(content);

  // submit
  this.submit();
});

$("#hint").summernote({
  height: 100,
  toolbar: false,
  placeholder: "type with apple, orange, watermelon and lemon",
  hint: {
    words: ["apple", "orange", "watermelon", "lemon"],
    match: /\b(\w{1,})$/,
    search: function (keyword, callback) {
      callback(
        $.grep(this.words, function (item) {
          return item.indexOf(keyword) === 0
        })
      )
    },
  },
})
