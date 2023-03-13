/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function($) {
	$(".burger-menu").click((e) => {
		$(".site-header-conditional").toggle();
		const icon = $(e.target);
		if (icon.hasClass("dashicons-menu")) {
			icon.removeClass('dashicons-menu').addClass('dashicons-no');
		} else {
			icon.removeClass('dashicons-no').addClass('dashicons-menu');
		}
	});
}($ = window.jQuery) );
