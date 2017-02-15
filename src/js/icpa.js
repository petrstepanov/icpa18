// The module pattern
var UiController = (function($) {

    // Private variable that is true during the animations
    var menuAnimationInProgress = false;

    var log = function(string){
        console.log(string);
    };

    var isFunction = function(functionToCheck) {
        var getType = {};
        return functionToCheck && getType.toString.call(functionToCheck) === '[object Function]';
    }

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
                        if (isFunction(callback)){
                            setTimeout(function(){
                                callback();
                            }, 10);
                        }
                    });
                $('.header').removeClass('menu-opened');
            }
        }
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
            // First close the login modal
            $('#loginModal').modal('hide');
            setTimeout(function(){
                $('#forgotPasswordModal').modal('show');
            }, 500);
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
        init: init
//        openMenu: openMenu,
//        closeMenu: closeMenu
    };
})(jQuery);

jQuery( document ).ready(function() {
    UiController.init();
});
