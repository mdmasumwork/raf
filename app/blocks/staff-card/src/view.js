/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

let newModalId;

document.addEventListener('DOMContentLoaded', function() {
	const staffCards = document.querySelectorAll('.staff-card');

	staffCards.forEach(function(card) {
		const modalId = card.dataset.id;
		card.addEventListener('click', function () {
			openModal(modalId);
		});
	});

	const closeIcons = document.querySelectorAll('.close-icon');
	closeIcons.forEach(function(closeIcon) {
		const modalId = closeIcon.dataset.id;
		closeIcon.addEventListener('click', function () {
			closeModal(modalId);
		});
	});
});


function openModal(modalId) {

	// Creating a clone of the modal and moving it outside the content wrapper.
	const modal = document.getElementById(modalId);
	const modalClone = modal.cloneNode(true);
	newModalId = 'modal-' + new Date().getTime() + '-' + Math.random().toString(36).slice(2);
	modalClone.setAttribute("id", newModalId);

	const closeIcon = modalClone.querySelector(".close-icon");
	closeIcon.setAttribute("data-id", newModalId);
	document.body.appendChild(modalClone);
	closeIcon.addEventListener('click', function () {
		closeModal(newModalId);
	});



	// Creating the overlay
	let overlay = document.createElement('div');
	if (document.getElementById('modal-overlay')) {
		overlay = document.getElementById('modal-overlay');
	} else {
		overlay.setAttribute('id', 'modal-overlay');
		document.body.appendChild(overlay);
	}

	// Adding the class to blur the background content
	document.getElementById("page").classList.add('content-blur');

	modalClone.style.display = 'block';
	overlay.style.display = 'block';
}

function closeModal(modalId) {
	const modalClone = document.getElementById(modalId);
	document.body.removeChild(modalClone);
	document.getElementById("page").classList.remove('content-blur');
	document.getElementById('modal-overlay').style.display = 'none';
}
