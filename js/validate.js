console.log("validate function");
//form1
// $("form[data-form='one']").validate({
// 	rules: {
// 		name: "required"
// 	},
// 	messages: {
// 		test: "Please enter valid input"
// 	}
// });

//form2
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

$("#nextBtn").on("click", form2);

function form2(e) {
	e.preventDefault();
	if ($("form[data-form2-step='one']").valid() == false) {
		return;
	}
	if ($("form[data-form2-step='two']").valid() == false) {
		return;
	}
	if ($("form[data-form2-step='three']").valid() == false) {
		return;
	}
}
