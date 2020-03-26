var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
	// This function will display the specified tab of the form ...
	var x = document.getElementsByClassName("tab");
	x[n].style.display = "block";
	// ... and fix the Previous/Next buttons:
	if (n == 0) {
		$(".prevBtn").hide();
	} else {
		$(".prevBtn").show();
	}
	if (n == x.length - 1) {
		$(".nextBtn").hide();
	} else {
		$(".nextBtn").show();
	}
}

//form2 validation
$("form[data-form2-step='one']").validate({
	rules: {
		"org-name": "required",
		"webiste-url": "required",
		"email-address": "required",
		"social-link": "required",
		city: "required"
	},
	messages: {
		"org-name": "Ange giltigt organisationsnamn",
		"webiste-url": "Ange giltig webbplats / url",
		"email-address": "Ange organisationens giltiga e-postadress",
		"social-link": "Ange en giltig länk till sociala medier",
		city: "Ange giltigt Ort/kommun"
	}
});

$("form[data-form2-step='two']").validate({
	rules: {
		"org-activity": "required"
	},
	messages: {
		"org-activity": "Vänligen ange organisationsaktiviteter"
	}
});

$("form[data-form2-step='three']").validate({
	rules: {
		"contact-name": "required",
		"contact-email-address": "required",
		"contact-phone-no": "required",
		number: "required",
		message: "required"
	},
	messages: {
		"contact-name": "Ange giltigt kontaktnamn",
		"contact-email-address": "Ange giltig e-postadress för kontakt",
		"contact-phone-no": "Ange giltigt kontakttelefonnummer",
		number: "Ange giltigt nummer",
		message: "Ange ett meddelande"
	}
});

function step1next() {
	var x = document.getElementsByClassName("tab");
	x[0].style.display = "none";
	showTab(1);
}
function step2Prev() {
	showTab(0);
	$("form[data-form2-step='one']")
		.parent()
		.hide();
}
function step2next() {
	if ($("form[data-form2-step='one']").valid() == false) {
		return;
	} else {
		$("form[data-form2-step='one']")
			.parent()
			.hide();

		$("form[data-form2-step='two']")
			.parent()
			.show();
	}
}

function step3Prev() {
	showTab(1);
	$("form[data-form2-step='two']")
		.parent()
		.hide();
}
function step3next() {
	if ($("form[data-form2-step='two']").valid() == false) {
		return;
	} else {
		$("form[data-form2-step='two']")
			.parent()
			.hide();

		$("form[data-form2-step='three']")
			.parent()
			.show();
		$(".nextBtn").hide();
	}
}

function step4Prev() {
	showTab(2);
	$("form[data-form2-step='three']")
		.parent()
		.hide();
}
function step4next() {
	if ($("form[data-form2-step='three']").valid() == false) {
		return;
	} 
}
