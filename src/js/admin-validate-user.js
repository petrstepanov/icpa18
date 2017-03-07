(function ($) {
  $('.js--validate-user-button').click(function () {
    var val = $('input[name=meta-status]').val()
    if (val === 'pending') {
      $('input[name=meta-status]').val('approved')
      $(this).html('Undo')
    } else {
      $('input[name=meta-status]').val('pending')
      $(this).html('Validate')
    }
  })
})(jQuery)
