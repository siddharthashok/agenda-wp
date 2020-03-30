let tabArray = document.getElementsByClassName("tab");
let currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

let formStep1 = $("form[data-form1-step='one']");
let formStep2 = $("form[data-form1-step='two']");
let formStep3 = $("form[data-form1-step='three']");

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

function hideformtab(hideform) {
	hideform.parent().hide();
}

//form validation
formStep1.validate({
	rules: {
		"event-title": "required",
		organizer: "required",
		"event-date": "required",
		"event-time": "required",
		"event-location": "required",
		address: "required"
	},
	messages: {
		"event-title": "Ange händelsens titel",
		organizer: "Vänligen ange organisatören",
		"event-date": "Ange händelsedatum",
		"event-time": "Ange händelsetid",
		"event-location": "Ange evenemangsplatsen",
		address: "Ange adress"
	}
});

formStep2.validate({
	rules: {
		"event-description": "required",
		"event-cost": "required"
	},
	messages: {
		"event-description": "Ange händelsebeskrivningen",
		"event-cost": "Ange händelsens kostnad"
	}
});

formStep3.validate({
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
$("#form1step1Next").click(() => {
	tabArray[0].style.display = "none";
	showTab(1);
});

$("#form1step2Prev").click(() => {
	showTab(0);
	hideformtab(formStep1);
});
$("#form1step2Next").click(() => {
	if (formStep1.valid() === false) {
		return;
	} else {
		hideformtab(formStep1);
		showTab(2);
	}
});

$("#form1step3Prev").click(() => {
	showTab(1);
	hideformtab(formStep2);
});
$("#form1step3Next").click(() => {
	if (formStep2.valid() === false) {
		return;
	} else {
		hideformtab(formStep2);
		showTab(3);
	}
});

$("#form1step4Prev").click(() => {
	showTab(2);
	hideformtab(formStep3);
});
$("#form1step4Next").click(() => {
	if (formStep3.valid() === false) {
		return;
	}
});

//date picker
$(function() {
	$("#event-datepicker").datepicker();
});
