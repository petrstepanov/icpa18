(function ($, Dropzone) {
  var myDropzoneTemplate = '<div class="media py-4 px-4 dz-preview dz-file-preview">' +
                             '<div class="d-flex mr-3">' +
                               '<svg class="svg-icon file"><use xlink:href="#file"></use></svg>' +
                               // '<div class="progress mt-2 dz-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div></div>                        '
                             '</div>' +
                             '<div class="media-body dz-details">' +
                               '<p class="strong mt-2 mb-1 dz-filename"><span data-dz-name></span></p>' +
                               '<p class="text-black-opaque small js--file-details">' +
                                 '<span class="dz-size" data-dz-size></span>' +
                                 '<span class="ml-2">Uploading...</span>' +
                               '</p>' +
                               '<p class="text-danger small dz-error-message">' +
                                 '<span data-dz-errormessage></span>' +
                               '</p>' +
                             '</div>' +
                           '</div>'

  var myDropzone = new Dropzone('#ajax_user_upload_form', {
    url: uploadNamespace.ajaxurl,
    maxFiles: 1,
    maxFilesize: 5, // MB
    previewTemplate: myDropzoneTemplate
  })

  myDropzone.on('success', function (file, jsonString) {
    var data = JSON.parse(jsonString)
    if (data.error === true) {
      NotificationCenter.alert(data.message, 'error')
      // this.removeAllFiles()
    } else {
      NotificationCenter.alert(data.message, 'success')
      $('#ajax_user_remove_form .js--filename').html(file.name)
      $('#ajax_user_remove_form .js--filesize').html(this.filesize(file.size))
      $('#ajax_user_remove_form [name=filename]').attr('value', file.name)
      $('#ajax_user_upload_form').hide()
      this.removeAllFiles()
      $('#ajax_user_remove_form').show()
      $('#ajax_user_payment_form input').prop('disabled', true)
    }
  })

  // myDropzone.on('addedfile', function (file) {
  //   $('#ajax_user_remove_form .js--filesize').html()
  // })
//
//   $('#ajax_user_upload_form').submit(function (event) {
//     // Stop regular form submission
//     event.preventDefault()
//     var $form = $(this)
//     var $submit = $form.find('input[type=submit]')
//
//     // Disable 'Submit' button
//     $submit.prop('disabled', true)
//
//     // Send the data using post (ajaxnamespace.ajaxurl injected by Wordpress)
//     var posting = $.post(uploadNamespace.ajaxurl, $form.serialize())
//
//     posting.done(function (jsonString) {
//       var data = JSON.parse(jsonString)
//       if (data.error === true) {
//         NotificationCenter.alert(data.message, 'error')
//       } else {
//         // If success response - update Total Price field
//         $('#js--total-price').html('' + data.totalPrice)
//       }
//     })
//
//     posting.fail(function () {
//       NotificationCenter.alert('Something went wrong. Please try again later!', 'error')
//     })
//
//     // Enable 'Submit' button after the request is done
//     posting.always(function () {
//       // NotificationCenter.alert("asdasdasd", 'success');
//       $submit.prop('disabled', false)
//     })
//   })
})(jQuery, Dropzone)
