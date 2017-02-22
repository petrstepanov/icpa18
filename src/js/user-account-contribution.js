(function ($) {
  $('#ajax_user_contribution_form').submit(function (event) {
        // Stop regular form submission
    event.preventDefault()
    var $form = $(this)
    var $submit = $form.find('input[type=submit]')

        // Disable 'Submit' button
    $submit.prop('disabled', true)

        // Send the data using post (ajaxnamespace.ajaxurl injected by Wordpress)
    var posting = $.post(contributionNamespace.ajaxurl, $form.serialize())

    posting.done(function (jsonString) {
      var data = JSON.parse(jsonString)
      if (data.error === true) {
        NotificationCenter.alert(data.message, 'error')
      } else {
                // If success responce - close registration modal
        NotificationCenter.alert(data.message, 'success')
        $('#user-feedback-container strong').html('Your Contribution Details are submitted and our administrators need to validate them. <br />We will send you an email soon!')
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
