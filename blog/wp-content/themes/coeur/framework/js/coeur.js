
jQuery(document).ready(function($) { //noconflict wrapper
	$('input#submit').addClass('btn btn-primary');
	
	$("#commentform").removeAttr("novalidate");

	$("[rel='tooltip']").tooltip();

	$('.comment-toggle').click(function () {
    $('#commentreveal').slideToggle('2000', function () {
        // Animation complete.
    });
	});

	$('#search_toggle').click(function () {
    $('.search-box').slideToggle('2000', function () {
        // Animation complete.
    });
	});

});//end noconflict