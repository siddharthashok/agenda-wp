$(".search-toggle").addClass("closed");

$(".search-toggle .search-mobile").click(function (e) {
	if ($(".search-toggle").hasClass("closed")) {
		$(".search-toggle").removeClass("closed").addClass("opened");
		$(".search-toggle, .search-container").addClass("opened");
		$("#search-terms").focus();
	} else {
		$(".search-toggle").removeClass("opened").addClass("closed");
		$(".search-toggle, .search-container").removeClass("opened");
	}
});
$(".search-toggle .search").click(function (e) {
	if ($(".search-toggle").hasClass("closed")) {
		$(".search-toggle").removeClass("closed").addClass("opened");
		$(".search-toggle, .search-container").addClass("opened");
		$("#search-terms").focus();
	} else {
		$(".search-toggle").removeClass("opened").addClass("closed");
		$(".search-toggle, .search-container").removeClass("opened");
	}
});

$(".search-close").click(function (e) {
	if ($(".search-toggle").hasClass("closed")) {
		$(".search-toggle").removeClass("closed").addClass("opened");
		$(".search-toggle, .search-container").addClass("opened");
		$("#search-terms").focus();
	} else {
		$(".search-toggle").removeClass("opened").addClass("closed");
		$(".search-toggle, .search-container").removeClass("opened");
	}
});

$("#filter-height").click(function (e) {
	console.log('this does not work');
	if ($("#filter-height").hasClass("filter-height")) {
		$("#filter-height").removeClass("filter-height");
		$(".show-more-filters").html('Visa Färre');
	} else {
		$("#filter-height").addClass("filter-height");
		$(".show-more-filters").html('Visa Fler');
	}
});
