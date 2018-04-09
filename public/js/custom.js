$(document).ready(function () {
	$('[data-toggle="offcanvas"]').click(function () {
		$('.row-offcanvas').toggleClass('active')
	});

	// Hover dropdown menu
	$('ul.nav li.dropdown').hover(function() {
	    $(this).find('.dropdown-menu').stop(true, true).delay(20).fadeIn(30);
	}, function() {
	    $(this).find('.dropdown-menu').stop(true, true).delay(20).fadeOut(30);
	});
	$('.datepicker').datepicker({
	    format: 'dd-mm-yyyy',
	    autoclose: true
	});
});

$('#flash-overlay-modal').modal();
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);