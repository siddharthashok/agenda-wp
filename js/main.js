$(".search-toggle").addClass("closed");

$(".search-toggle .search-mobile").click(function(e) {
	if ($(".search-toggle").hasClass("closed")) {
		$(".search-toggle")
			.removeClass("closed")
			.addClass("opened");
		$(".search-toggle, .search-container").addClass("opened");
		$("#search-terms").focus();
	} else {
		$(".search-toggle")
			.removeClass("opened")
			.addClass("closed");
		$(".search-toggle, .search-container").removeClass("opened");
	}
});
$(".search-toggle .search").click(function(e) {
	if ($(".search-toggle").hasClass("closed")) {
		$(".search-toggle")
			.removeClass("closed")
			.addClass("opened");
		$(".search-toggle, .search-container").addClass("opened");
		$("#search-terms").focus();
	} else {
		$(".search-toggle")
			.removeClass("opened")
			.addClass("closed");
		$(".search-toggle, .search-container").removeClass("opened");
	}
});
