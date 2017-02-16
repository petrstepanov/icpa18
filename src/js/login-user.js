(function($){

    $('#ajax_login_form').submit(function(event){

        // Stop regular form submission
        event.preventDefault();
        $form = $(this);

        // Send the data using post (ajaxnamespace.ajaxurl injected by Wordpress)
        var posting = $.post(ajaxnamespace.ajaxurl, $form.serialize());

        posting.done(function(data){
            alert(data);
        });

        posting.fail(function(data){
            alert('fail');
        });

        posting.always(function(){
            alert('always');
        });

    });

})(jQuery);
