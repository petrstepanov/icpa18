(function ($) {
  $('#ajax_login_form').submit(function (event) {
        // Stop regular form submission
    event.preventDefault()
    var $form = $(this)
    var $submit = $form.find('input[type=submit]')

        // Disable 'Submit' button
    $submit.prop('disabled', true)

        // Send the data using post (ajaxnamespace.ajaxurl injected by Wordpress)
    var posting = $.post(loginnamespace.ajaxurl, $form.serialize())

    posting.done(function (jsonString) {
      var data = JSON.parse(jsonString)
      if (data.error === true) {
        NotificationCenter.alert(data.message, 'error')
      } else {
                // If success responce - close registration modal
        UiController.closeModal('login', function () {
                    // And redirect to Account page
          window.location = loginnamespace.redirecturl
        })
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
