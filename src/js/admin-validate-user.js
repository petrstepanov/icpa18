(function ($) {
  $('.js--validate-user-button').click(function () {
    var val = $('input[name=meta-status]').val()
    if (val === 'pending') {
      $('input[name=meta-status]').val('approved')
      $(this).html('Undo')
    }
  })
})(jQuery)
