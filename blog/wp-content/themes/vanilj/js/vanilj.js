// Object states
var readingBarIsActive = false,
	scrollTimedout = false,
	searchActive = false,
	categoriesActive = false;

jQuery(document).ready(function() {

	// jQuery objects
	$header = jQuery("header.header"),
	$readingProgress = jQuery(".header-reading-progress"),
	$progressBar = $readingProgress.find('div'),
	$readTimeMeta = jQuery(".entry-meta-readtime--single"),

	$searchContainer = jQuery(".header-search-container"),
	$searchInput = $searchContainer.find('.header-search-input'),
	$searchTrigger = jQuery(".header-search-trigger"),
	$searchNoJS = jQuery("footer.footer #search"),

	$categoriesTrigger = $header.find(".header-categories-trigger"),
	$categoriesNoJS = jQuery("footer.footer #categories");


	// Reading time variables
	headerHeight = $header.outerHeight(),
	scrollInterval = 150,
	windowHeight = jQuery(window).height();
	jQuery(window).scroll(progressScroll);

	// Search functions
	$searchTrigger.on('click', showSearch);
	$searchInput.on('blur', showSearch);
	$searchNoJS.remove();

	// Categories functions
	$categoriesTrigger.on('click', showCategories);

});

function progressScroll() {
	if(!scrollTimedout) {
		var sT = jQuery(window).scrollTop(),
		articleHeight = jQuery("main > article.post").outerHeight();
		if(sT > headerHeight && !readingBarIsActive) {
			$readTimeMeta.addClass('entry-meta-readtime--scrolled');
			readingBarIsActive = !readingBarIsActive;
		} else if(sT < headerHeight && readingBarIsActive) {
			$readTimeMeta.removeClass('entry-meta-readtime--scrolled');
			readingBarIsActive = !readingBarIsActive;
		}
		var readPercentage = (sT - headerHeight + windowHeight/2) * 100 / articleHeight;
		$progressBar.css('width',readPercentage+'%');
		scrollTimedout = true;
		setTimeout(function() {
			scrollTimedout = false;
		}, scrollInterval);
	}
}

function showSearch(e) {
	e.preventDefault();
	if(searchActive) {
		$header.removeClass('header--search');
	} else {
		$header.addClass('header--search');
		$searchInput.focus();
	}
	searchActive = !searchActive;
}
function showCategories(e) {
	e.preventDefault();
	if(categoriesActive) {
		$header.removeClass('header--categories');
	} else {
		$header.addClass('header--categories');
	}
	categoriesActive = !categoriesActive;
}