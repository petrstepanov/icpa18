var Utils = (function () {
  var isString = function (variable) {
    return (typeof variable === 'string' || variable instanceof String)
  }

  var isFunction = function (variable) {
    var getType = {}
    return variable && getType.toString.call(variable) === '[object Function]'
  }

  var removeHash = function () {
    // If browser supports history.pushState http://caniuse.com/#search=pushstate
    if (window.history.pushState) {
      window.history.pushState('', document.title, window.location.pathname + window.location.search)
    // If not - remove the hash but keep the '#' symbol
    } else {
      window.location.hash = ''
    }
  }

  var setHashWithoutPageJump = function (hash) {
    // If browser supports history.pushState http://caniuse.com/#search=pushstate
    if (window.history.pushState) {
      window.history.pushState(null, null, hash)
    // If not - remove id from the element, do hash replace and set the id back
    } else {
      var id = hash.substring(1)
      var el = document.getElementById(id)
      if (el) el.removeAttribute('id')
      window.location.hash = hash
      setTimeout(function () {
        if (el) el.setAttribute('id', id)
      }, 50)
    }
  }

  return {
    isString: isString,
    isFunction: isFunction,
    removeHash: removeHash,
    setHashWithoutPageJump: setHashWithoutPageJump
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
    // If page loaded with hash - show correspondent modal
    var hash = window.location.hash
    if (hash) {
      var id = hash.substring(1)
      $('[id="' + id + '"][role="dialog"]').modal('show')
    }
    // // Update hash when clicking on a tab
    // $('[role="dialog"]').on('shown.bs.modal', function (e) {
    //   Utils.setHashWithoutPageJump('#' + e.target.id)
    // })
    // // Clear hash when dialog closed
    // $('[role="dialog"]').on('hidden.bs.modal', function (e) {
    //   Utils.removeHash()
    // })
  }

  var initShowTabOnHash = function () {
    // Javascript to enable link to tab
    var hash = window.location.hash
    if (hash) {
      $('[data-toggle="tab"][href="' + hash + '"]').tab('show')
      // Disable anchor "jump" when loading a page
      setTimeout(function () { window.scrollTo(0, 0) }, 1)
    } else {
      $('[data-toggle="tab"]:first').tab('show')
    }
    // Now enable fading animation (after we showed the tab we need)
    // Because fading on the first load looks ugly and flickrs
    $('[role="tabpanel"]:not(.active)').addClass('fade')
    $('[role="tabpanel"][class="active"]').addClass('show fade')

    // Update hash when clicking on a tab
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      Utils.setHashWithoutPageJump(e.target.hash)
    })
    // TODO: show tab on hash update
  }

  var init = function () {
    initMenuToggle()
    initRegistrationDialogOpen()
    initLoginDialogOpen()
    initForgotPasswordDialogOpen()
    initShowModalOnHash()
    initShowTabOnHash()
  }

    // Public API
  return {
    init: init,
//    closeLoginModalAndOpenForgotPassword: closeLoginModalAndOpenForgotPassword,
// closeRegisterModal: closeRegisterModal
    closeModal: closeModal,
    openModal: openModal,
    initShowTabOnHash: initShowTabOnHash
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

// UiController.initShowTabOnHash()

Dropzone.autoDiscover = false

jQuery(document).ready(function () {
  UiController.init()
  if (typeof onloadNotification !== 'undefined') {
    NotificationCenter.alert(onloadNotification.message, onloadNotification.type)
  }
})
