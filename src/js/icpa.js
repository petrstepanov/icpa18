var Utils = (function () {
  var isString = function (variable) {
    return (typeof variable === 'string' || variable instanceof String)
  }

  var isFunction = function (variable) {
    var getType = {}
    return variable && getType.toString.call(variable) === '[object Function]'
  }

  return {
    isString: isString,
    isFunction: isFunction
  }
})()

var UiController = (function ($) {
    // Private variable that is true during the animations
  var menuAnimationInProgress = false

  // var log = function (string) {
  //   console.log(string)
  // }

  var openMenu = function () {
    if (menuAnimationInProgress === false) {
      if (!$('.header').hasClass('menu-opened')) {
        // log('opening menu...')
        menuAnimationInProgress = true
        $('.header .js--menu-glass-panel').show().one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
                    function (e) {
                      menuAnimationInProgress = false
                      // log('opening menu... done')
                    })
        setTimeout(function () {
          $('.header').addClass('menu-opened')
        }, 10)
      }
    }
  }

  var closeMenu = function (callback) {
    if (menuAnimationInProgress === false) {
      if ($('.header').hasClass('menu-opened')) {
        // log('closing menu...')
        menuAnimationInProgress = true
        $('.header .menu-glass-panel').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
                    function (e) {
                      $(this).hide()
                      menuAnimationInProgress = false
                      // log('closing menu... done')
                        // Execute callback if passed
                      if (Utils.isFunction(callback)) {
                        callback()
                      }
                    })
        $('.header').removeClass('menu-opened')
      }
    }
  }

  var openModal = function (modalId, callback) {
    // Open the modal
    $('#' + modalId).modal('show')
    // Attach event on modal open
    $('#' + modalId).on('shown.bs.modal', function (e) {
      // Unbind this event to call callback once
      if (Utils.isFunction(callback)) {
        callback()
        $('#' + modalId).unbind()
      }
    })
  }

  var closeModal = function (modalId, callback) {
    // Close the modal
    $('#' + modalId).modal('hide')
    // Attach event on login modal close
    $('#' + modalId).on('hidden.bs.modal', function (e) {
      // Unbind this event to call callback once
      if (Utils.isFunction(callback)) {
        callback()
        $('#' + modalId).unbind()
      }
    })
  }

  var initMenuToggle = function () {
        // Menu opening and closing trigger
    $('.js--open-menu-button').click(function (event) {
      event.stopPropagation()
      event.preventDefault()
      if ($('.header').hasClass('menu-opened')) {
                // If menu is opened
        closeMenu()
      } else {
                // If menu is closed
        openMenu()
      }
    })

        // Stop click event propagation through the menu
    $('.js--menu').click(function (event) {
      event.stopPropagation()
    })

        // If clicked Glass Panel always close the menu and disable propagation
    $('.js--menu-glass-panel').click(function (event) {
      event.stopPropagation()
      closeMenu()
    })
  }

  var initRegistrationDialogOpen = function () {
        // Open registration dialog from the menu
    $('.js--menu-register-button').click(function (event) {
      event.preventDefault()
            // First close the menu
      closeMenu(function () {
                // When closed, show registration modal
        openModal('register')
      })
    })
  }

  var initLoginDialogOpen = function () {
        // Open login dialog from the menu
    $('.js--menu-login-button').click(function (event) {
      event.preventDefault()
            // First close the menu
      closeMenu(function () {
                // When closed, show login modal
        openModal('login')
      })
    })
  }

  var initForgotPasswordDialogOpen = function () {
        // Open login dialog from the menu
    $('.js--forgot-password-button').click(function (event) {
      event.preventDefault()
      closeModal('login', function () {
        openModal('forgot-password')
      })
    })
  }

  var initShowModalOnHash = function () {
    $(window.location.hash).modal('show')
  }

  var init = function () {
    initMenuToggle()
    initRegistrationDialogOpen()
    initLoginDialogOpen()
    initForgotPasswordDialogOpen()
    initShowModalOnHash()
  }

    // Public API
  return {
    init: init,
//    closeLoginModalAndOpenForgotPassword: closeLoginModalAndOpenForgotPassword,
// closeRegisterModal: closeRegisterModal
    closeModal: closeModal,
    openModal: openModal
  }
})(jQuery)

var NotificationCenter = (function ($, noty) {
  var themeName = 'someOtherTheme'

  var alert = function (text, type) {
    if (Utils.isString(text) && Utils.isString(type)) {
            // Remove Wordpress error prefix
      text = text.replace('<strong>ERROR</strong>: ', '')

      noty({
        text: text,
        type: type,
        dismissQueue: true,
        layout: 'topLeft',
        theme: themeName,
        closeWith: ['click'],
        maxVisible: 10,
        template: '<p class="noty_type">' + type + '</p><p class="noty_message"><span class="noty_text"></span></p>',
        timeout: 5000,
        animation: {
          open: 'animated fadeInUp',
          close: 'animated fadeOutUp',
          easing: 'swing',
          speed: 300
        },
        callback: {
          onShow: function () {
            $('.someOtherTheme:last-child').find('[href$="lostpassword"]').attr('href', '#').click(function (event) {
              event.preventDefault()
              UiController.closeModal('login', function () {
                UiController.openModal('forgot-password')
              })
            })
          }
        }
      })
    }
  }

  return {
    alert: alert
  }
})(jQuery, noty)

jQuery(document).ready(function () {
  UiController.init()
})
