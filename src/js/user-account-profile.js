(function($) {

    $('#ajax_user_profile_form').submit(function(event) {

        // Stop regular form submission
        event.preventDefault();
        var $form = $(this);
        var $submit = $form.find('input[type=submit]');

        // Disable 'Submit' button
        $submit.prop('disabled', true);

        // Send the data using post (ajaxnamespace.ajaxurl injected by Wordpress)
        var posting = $.post(profileNamespace.ajaxurl, $form.serialize());

        posting.done(function(jsonString) {
            var data = JSON.parse(jsonString);
            if (data.error == true) {
                NotificationCenter.alert(data.message, 'error');
            } else {
                // If success responce - show notification
                NotificationCenter.alert(data.message, 'success');
                // And update existing fields
                var displayName = $form.find('#first_name').val() + ' ' + $form.find('#last_name').val();
                $('.js--display-name').html(displayName);
                var organization = $form.find('#description').val();
                $('.js--organization').html(organization);
            }
        });

        posting.fail(function() {
            NotificationCenter.alert('Something went wrong. Please try again later!', 'error');
        });

        // Enable 'Submit' button after the request is done
        posting.always(function() {
            // NotificationCenter.alert("asdasdasd", 'success');
            $submit.prop('disabled', false);
        });

    });

})(jQuery);
