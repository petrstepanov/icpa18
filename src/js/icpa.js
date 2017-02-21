var Utils = (function(){

    var isString = function(variable){
        return (typeof variable === 'string' || variable instanceof String);
    };

    var isFunction = function(variable){
        var getType = {};
        return variable && getType.toString.call(variable) === '[object Function]';
    };

    return {
        isString: isString,
        isFunction: isFunction
    };
})();

var UiController = (function($) {

    // Private variable that is true during the animations
    var menuAnimationInProgress = false;

    var log = function(string){
        console.log(string);
    };

    var openMenu = function(){
        if (menuAnimationInProgress === false){
            if(!$('.header').hasClass('menu-opened')){
                log('opening menu...');
                menuAnimationInProgress = true;
                $('.header .js--menu-glass-panel').show().one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
                    function(e) {
                        menuAnimationInProgress = false;
                        log('opening menu... done');
                    });
                setTimeout(function(){
                    $('.header').addClass('menu-opened');
                }, 10);
            }
        }
    };

    var closeMenu = function(callback){
        if (menuAnimationInProgress === false){
            if($('.header').hasClass('menu-opened')){
                log('closing menu...');
                menuAnimationInProgress = true;
                $('.header .menu-glass-panel').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
                    function(e) {
                        $(this).hide();
                        menuAnimationInProgress = false;
                        log('closing menu... done');
                        // Execute callback if passed
                        if (Utils.isFunction(callback)){
                            setTimeout(function(){
                                callback();
                            }, 10);
                        }
                    });
                $('.header').removeClass('menu-opened');
            }
        }
    };

    var closeLoginModalAndOpenForgotPassword = function(){
        // First close the login modal
        $('#loginModal').modal('hide');
        // Open forgot password in a few
        setTimeout(function(){
            $('#forgotPasswordModal').modal('show');
        }, 500);
    };

    var closeLoginModal = function(callback){
        // If callback passed execute it on modal close
        if (Utils.isFunction(callback)){
            $('#loginModal').on('hidden.bs.modal', function () {
                callback();
            });
        }
        // First close the login modal
        $('#loginModal').modal('hide');
    };

    var closeRegisterModal = function(callback){
        // First close the login modal
        $('#registerModal').modal('hide');

        setTimeout(function(){
            // If callback passed execute it on modal close
            if (Utils.isFunction(callback)){
                callback();
            }
        }, 500);
    };

    var initMenuToggle = function(){
        // Menu opening and closing trigger
        $('.js--open-menu-button').click(function(event){
            event.stopPropagation();
            event.preventDefault();
            if($('.header').hasClass('menu-opened')){
                // If menu is opened
                closeMenu();
            } else {
                // If menu is closed
                openMenu();
            }
        });

        // Stop click event propagation through the menu
        $('.js--menu').click(function(event){
            event.stopPropagation();
        });

        // If clicked Glass Panel always close the menu and disable propagation
        $('.js--menu-glass-panel').click(function(event){
            event.stopPropagation();
            closeMenu();
        });
    };

    var initRegistrationDialogOpen = function(){
        // Open registration dialog from the menu
        $('.js--menu-register-button').click(function(event){
            event.preventDefault();
            // First close the menu
            closeMenu(function(){
                // When closed, show registration modal
                $('#registerModal').modal('show');
            });
        });
    };

    var initLoginDialogOpen = function(){
        // Open login dialog from the menu
        $('.js--menu-login-button').click(function(event){
            event.preventDefault();
            // First close the menu
            closeMenu(function(){
                // When closed, show login modal
                $('#loginModal').modal('show');
            });
        });
    };

    var initForgotPasswordDialogOpen = function(){
        // Open login dialog from the menu
        $('.js--forgot-password-button').click(function(event){
            event.preventDefault();
            closeLoginModalAndOpenForgotPassword();
        });
    };

    var init = function(){
        initMenuToggle();
        initRegistrationDialogOpen();
        initLoginDialogOpen();
        initForgotPasswordDialogOpen();
    };

    // Public API
    return {
        init: init,
        closeLoginModalAndOpenForgotPassword: closeLoginModalAndOpenForgotPassword,
        closeLoginModal: closeLoginModal,
        closeRegisterModal: closeRegisterModal
    };
})(jQuery);

var NotificationCenter = (function($, noty){

    var themeName = 'someOtherTheme';

    var alert = function(text, type){
        if (Utils.isString(text) && Utils.isString(type)){
            // Remove Wordpress error prefix
            text = text.replace("<strong>ERROR</strong>: ", "");

            var n = noty({
                text:           text,
                type:           type,
                dismissQueue:   true,
                layout:         'topLeft',
                theme:          themeName,
                closeWith:      ['click'],
                maxVisible:     10,
                template:       '<p class="noty_type">' + type + '</p><p class="noty_message"><span class="noty_text"></span></p>',
                timeout:        5000,
                animation: {
                    open:   'animated fadeInUp',
                    close:  'animated fadeOutUp',
                    easing: 'swing',
                    speed:  300
                },
                callback: {
                    onShow: function(){
                        $('.someOtherTheme:last-child').find('[href$="lostpassword"]').attr("href", "#").click(function(event){
                            event.preventDefault();
                            UiController.closeLoginModalAndOpenForgotPassword();
                        });
                    }
                }
            });
        }
    };

    return {
        alert: alert
    };
})(jQuery, noty);

jQuery( document ).ready(function() {
    UiController.init();
});
