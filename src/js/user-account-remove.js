(function ($, Dropzone) {
  $('#ajax_user_remove_form').submit(function (event) {
    // Stop regular form submission
    event.preventDefault()
    var $form = $(this)
    var $submit = $form.find('input[type=submit]')

    // Disable 'Submit' button
    $submit.prop('disabled', true)

    // Send the data using post (ajaxnamespace.ajaxurl injected by Wordpress)
    var posting = $.post(removeNamespace.ajaxurl, $form.serialize())

    posting.done(function (jsonString) {
      var data = JSON.parse(jsonString)
      if (data.error === true) {
        NotificationCenter.alert(data.message, 'error')
      } else {
        // If success response - update Total Price field
        NotificationCenter.alert(data.message, 'success')
        $('#ajax_user_remove_form').hide()
        $('#ajax_user_upload_form').show()
        $('#ajax_user_payment_form input').prop('disabled', false)
        $('#ajax_user_payment_form input[value=admission]').prop('disabled', true)
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
})(jQuery, Dropzone)
