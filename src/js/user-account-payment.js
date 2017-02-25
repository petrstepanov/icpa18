(function ($) {
  // Form interactions - strike out the row when unchecked
  $('#ajax_user_payment_form input[type=checkbox]').change(function () {
    var $row = $(this).closest('.row')
    if ($(this).is(':checked')) {
      $row.removeClass('strikeThrough')
    } else {
      $row.addClass('strikeThrough')
    }
  })

  // Form Submission
  $('#ajax_user_payment_form input[type=checkbox], #ajax_user_payment_form input[type=radio]').change(function () {
    $('#ajax_user_payment_form').submit()
  })

  $('#ajax_user_payment_form').submit(function (event) {
    // Stop regular form submission
    event.preventDefault()
    var $form = $(this)
    var $submit = $form.find('input[type=submit]')

    // Disable 'Submit' button
    $submit.prop('disabled', true)

    // Send the data using post (ajaxnamespace.ajaxurl injected by Wordpress)
    var posting = $.post(paymentNamespace.ajaxurl, $form.serialize())

    posting.done(function (jsonString) {
      var data = JSON.parse(jsonString)
      if (data.error === true) {
        NotificationCenter.alert(data.message, 'error')
      } else {
        // If success response - update Total Price field
        $('#js--total-price').html(''+data.totalPrice)
      }
    })

    posting.fail(function () {
      NotificationCenter.alert('Something went wrong. Please try again later!', 'error')
    })

        // Enable 'Submit' button after the request is done
    posting.always(function () {
            // NotificationCenter.alert("asdasdasd", 'success');
      $submit.prop('disabled', false)
    })
  })
})(jQuery)
