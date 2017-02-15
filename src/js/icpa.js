// The module pattern
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

    var closeMenu = function(){
        if (menuAnimationInProgress === false){
            if($('.header').hasClass('menu-opened')){
                log('closing menu...');
                menuAnimationInProgress = true;
                $('.header .menu-glass-panel').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',
                    function(e) {
                        $(this).hide();
                        menuAnimationInProgress = false;
                        log('opening menu...');
                    });
                $('.header').removeClass('menu-opened');
            }
        }
    };

    var init = function(){
        // Menu opening and closing trigger
        $('.js--open-menu-button').click(function(event){
            event.stopPropagation();
            // var self = this;
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
