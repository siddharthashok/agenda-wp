if ($("#event-form-modal")) {
	let eventTabArray = $("#event-form-modal .tab");
	// console.log(eventTabArray);

	let eventCurrentTab = 0; // Current tab is set to be the first tab (0)
	showTab(eventCurrentTab); // Display the current tab

	var eventFormStep1 = $("form[data-form1-step='one']");
	var eventFormStep2 = $("form[data-form1-step='two']");
	var eventFormStep3 = $("form[data-form1-step='three']");

	//show the tab and the buttons
	function showTab(n) {
		// This function will display the specified tab of the form ...
		eventTabArray[n].style.display = "block";
		// ... and fix the Previous/Next buttons:
		if (n == 0) {
			$(".form-publish.prevBtn").hide();
		} else {
			$(".form-publish.prevBtn").show();
		}
		if (n == eventTabArray.length - 2) {
			$(".form-publish.nextBtn").hide();
		} else {
			$(".form-publish.nextBtn").show();
		}
		if (n == eventTabArray.length - 1) {
			document.getElementById("form-close-title").style.visibility = "hidden";
			$(".form-publish.prevBtn").hide();
			$(".form-publish.nextBtn").hide();
		}
	}

	function hideformtab(hideform) {
		hideform.parent().hide();
	}

	//form validation
	eventFormStep1.validate({
		rules: {
			"event-title": "required",
			organizer: "required",
			"event-date": "required",
			"event-time": "required",
			"event-location": "required",
			address: "required",
			"check1[]": {
				require_from_group: [1, ".styled-checkbox"]
			}
		},
		messages: {
			"event-title": "Ange händelsens titel",
			organizer: "Vänligen ange organisatören",
			"event-date": "Ange händelsedatum",
			"event-time": "Ange händelsetid",
			"event-location": "Ange evenemangsplatsen",
			address: "Ange adress",
			"check1[]": {
				require_from_group: "Välj minst ett alternativ"
			}
		},
		errorPlacement: function(error, element) {
			if (element.attr("name") == "check1[]") {
				error.insertAfter("#checkbox1_error");
			} else {
				error.insertAfter(element);
			}
		} // end error placement
	});

	eventFormStep2.validate({
		rules: {
			"event-description": "required",
			"event-cost": "required",
			"check2[]": {
				require_from_group: [1, ".styled-checkbox"]
			}
		},
		messages: {
			"event-description": "Ange händelsebeskrivningen",
			"event-cost": "Ange händelsens kostnad",
			"check2[]": {
				require_from_group: "Välj minst ett alternativ"
			}
		},
		errorPlacement: function(error, element) {
			if (element.attr("name") == "check2[]") {
				error.insertAfter("#checkbox2_error");
			} else {
				error.insertAfter(element);
			}
		} // end error placement
	});

	eventFormStep3.validate({
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
		eventTabArray[0].style.display = "none";
		showTab(1);
	});

	$("#form1step2Prev").click(() => {
		showTab(0);
		hideformtab(eventFormStep1);
	});
	$("#form1step2Next").click(() => {
		if (eventFormStep1.valid() === false) {
			return;
		} else {
			hideformtab(eventFormStep1);
			showTab(2);
		}
	});

	$("#form1step3Prev").click(() => {
		showTab(1);
		hideformtab(eventFormStep2);
	});
	$("#form1step3Next").click(() => {
		if (eventFormStep2.valid() === false) {
			return;
		} else {
			hideformtab(eventFormStep2);
			showTab(3);
		}
	});

	$("#form1step4Prev").click(() => {
		showTab(2);
		hideformtab(eventFormStep3);
	});
	$("#form1step4Next").click(() => {
		if (eventFormStep3.valid() === false) {
			return;
		} else {
			hideformtab(eventFormStep3);

			let eventTitle = eventFormStep1.find("[name='event-title']").val();
			let organizer = eventFormStep1.find("[name='organizer']").val();
			let eventDatepicker = eventFormStep1.find("[name='event-datepicker']").val();
			let eventTimepicker = eventFormStep1.find("[name='event-timepicker']").val();
			let eventLocation = eventFormStep1.find("[name='event-location']").val();
			let address = eventFormStep1.find("[name='address']").val();
			let availability = [];

			eventFormStep1.find("[name='check1[]']:checked").each(function(index){
				availability.push($(this).val());
			});
			let eventDescription = eventFormStep2.find("[name='event-description']").val();
			let eventCost = eventFormStep2.find("[name='event-cost']").val();
			let websiteURL = eventFormStep2.find("[name='website-url']").val();
			let facebookLink = eventFormStep2.find("[name='facebook-link']").val();
			let linkOrganiserWebsite = eventFormStep2.find("[name='link-organiser-website']").val();
			let concerns = [];
			eventFormStep2.find("[name='check2[]']:checked").each(function(index){
				concerns.push($(this).val());
			});
			
			let contactName = eventFormStep3.find("[name='contact-name']").val();
			let contactEmailAddress = eventFormStep3.find("[name='contact-email-address']").val();
			let contactPhoneNo = eventFormStep3.find("[name='contact-phone-no']").val();
			let message = eventFormStep3.find("[name='message']").val();
			// debugger;
			const data = {
				eventTitle:eventTitle,
				organizer:organizer,
				eventDatepicker:eventDatepicker,
				eventTimepicker:eventTimepicker,
				eventLocation:eventLocation,
				address:address,
				availability:availability,
				eventDescription:eventDescription,
				eventCost:eventCost,
				websiteURL:websiteURL,
				facebookLink:facebookLink,
				linkOrganiserWebsite:linkOrganiserWebsite,
				websiteURL:websiteURL,
				concerns:concerns,
				contactName:contactName,
				contactEmailAddress:contactEmailAddress,
				contactPhoneNo:contactPhoneNo,
				message:message,
				action:"createEvent"
			}

			$.ajax({
				url: siteURL+"/wp-admin/admin-ajax.php",
				type: "POST",
				data: data
			}).then(function(reply){
				showTab(4);
			})

			
		}
	});

	//date picker
	$(function() {
		$("#event-datepicker").datepicker();
	});

	//time picker
	$(function() {
		$("#event-timepicker").timepicker();
	});
}
