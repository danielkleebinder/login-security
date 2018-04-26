/* 
 Created on : 26.04.2018
 Author     : Daniel Kleebinder
 */


$(document).ready(function () {
    // Disable smooth scrolling on internet explorer to
    // prevent "jumpy" page effect
    if (!!document.documentMode) {
        $('html').on("mousewheel", function () {
            if (event.preventDefault) {
                event.preventDefault();
            } else {
                event.returnValue = false;
            }
            var wd = event.wheelDelta;
            var csp = window.pageYOffset;
            window.scrollTo(0, csp - wd);
        });
    }
});


/**
 * Scroll to the parent element within 500 ms.
 */
$.fn.scrollView = function () {
    return this.each(function () {
        $("html, body").animate({
            scrollTop: $(this).offset().top
        }, 500);
    });
};