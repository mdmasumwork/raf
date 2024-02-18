/**
 * File search-bar.js.
 *
 * Handles toggling the search bar for small screens and enables TAB key
 */
( function($) {
    $("#search-bar-filter-icon").click((e) => {
        const icon = $(e.target);
        if (icon.hasClass("dashicons-filter")) {
            $(".search-bar-area-content-container").slideDown()
            icon.removeClass('dashicons-filter').addClass('dashicons-no');
        } else {
            $(".search-bar-area-content-container").slideUp()
            icon.removeClass('dashicons-no').addClass('dashicons-filter');
        }
    });
}($ = window.jQuery) );