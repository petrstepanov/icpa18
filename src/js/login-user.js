(function($){

    $('#ajax_login_form').submit(function(event){

        // Stop regular form submission
        event.preventDefault();
        $form = $(this);
        $submit = $form.find('input[type=submit]');

        // Disable 'Submit' button
        $submit.prop('disabled', true);

        // Send the data using post (ajaxnamespace.ajaxurl injected by Wordpress)
        var posting = $.post(ajaxnamespace.ajaxurl, $form.serialize());

        posting.done(function(json_string){
            var data = JSON.parse(json_string);
            NotificationCenter.alert(data.message, data.error ? 'error' : 'success');
        });

        posting.fail(function(){
            NotificationCenter.alert('Something went wrong. Please try again later!', 'error');
        });

        // Enable 'Submit' button after the request is done
        posting.always(function(){
            // NotificationCenter.alert("asdasdasd", 'success');
            $submit.prop('disabled', false);
        });

    });

})(jQuery);
