let tabArray = document.getElementsByClassName("tab");
let currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

let formStep1 = $("form[data-form2-step='one']");
let formStep2 = $("form[data-form2-step='two']");
let formStep3 = $("form[data-form2-step='three']");

//show the tab and the buttons
function showTab(n) {
	// This function will display the specified tab of the form ...
	tabArray[n].style.display = "block";
	// ... and fix the Previous/Next buttons:
	if (n == 0) {
		$(".prevBtn").hide();
	} else {
		$(".prevBtn").show();
	}
	if (n == tabArray.length - 1) {
		$(".nextBtn").hide();
	} else {
		$(".nextBtn").show();
	}
}

function showformtab(showform) {
	showform.parent().show();
}
function hideformtab(hideform) {
	hideform.parent().hide();
}

//form validation
$("form[data-form2-step='one']").validate({
	rules: {
		"org-name": "required",
		// "webiste-url": "required",
		// "email-address": "required",
		// "social-link": "required",
		city: "required"
	},
	messages: {
		"org-name": "Ange giltigt organisationsnamn",
		// "webiste-url": "Ange giltig webbplats / url",
		// "email-address": "Ange organisationens giltiga e-postadress",
		// "social-link": "Ange en giltig länk till sociala medier",
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
		number: "required"
		// message: "required"
	},
	messages: {
		"contact-name": "Ange giltigt kontaktnamn",
		"contact-email-address": "Ange giltig e-postadress för kontakt",
		"contact-phone-no": "Ange giltigt kontakttelefonnummer",
		number: "Ange giltigt nummer"
		// message: "Ange ett meddelande"
	}
});

//click events
$("#step1Next").click(() => {
	tabArray[0].style.display = "none";
	showTab(1);
});

$("#step2Prev").click(() => {
	showTab(0);
	formStep1.parent().hide();
});
$("#step2Next").click(() => {
	if (formStep1.valid() === false) {
		return;
	} else {
		hideformtab(formStep1);
		showformtab(formStep2);
	}
});

$("#step3Prev").click(() => {
	showTab(1);
	formStep2.parent().hide();
});
$("#step3Next").click(() => {
	if (formStep2.valid() === false) {
		return;
	} else {
		hideformtab(formStep2);
		showformtab(formStep3);
	}
});

$("#step4Prev").click(() => {
	showTab(2);
	formStep3.parent().hide();
});
$("#step4Next").click(() => {
	if (formStep3.valid() === false) {
		return;
	}
});
