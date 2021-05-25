if ($("#organisation-form")) {
	tabArray = $("#organisation-form .tab");

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
			$(".form-org.prevBtn").hide();
		} else {
			$(".form-org.prevBtn").show();
		}
		if (n == tabArray.length - 2) {
			$(".form-org.nextBtn").hide();
		} else {
			$(".form-org.nextBtn").show();
		}
		if (n == tabArray.length - 1) {
			document.getElementById("form-close-title").style.visibility = "hidden";
			$(".form-org.prevBtn").hide();
			$(".form-org.nextBtn").hide();
		}
	}

	function hideformtab(hideform) {
		hideform.parent().hide();
	}

	//form validation
	formStep1.validate({
		rules: {
			"org-name": "required",
			// "webiste-url": "required",
			// "email-address": "required",
			// "social-link": "required",
			// city: "required",
		},
		messages: {
			"org-name": "Ange giltigt organisationsnamn",
			// "webiste-url": "Ange giltig webbplats / url",
			// "email-address": "Ange organisationens giltiga e-postadress",
			// "social-link": "Ange en giltig länk till sociala medier",
			// city: "Ange giltigt Ort/kommun",
		},
	});

	formStep2.validate({
		rules: {
			"org-description": "required",
			"issues[]": {
				require_from_group: [1, ".styled-checkbox"],
			},
		},
		messages: {
			"org-description": "Vänligen ange organisationsaktiviteter",
			"issues[]": {
				require_from_group: "Välj minst ett alternativ",
			},
		},
		errorPlacement: function (error, element) {
			if (element.attr("name") == "issues[]") {
				error.insertAfter("#checkbox_error");
			} else {
				error.insertAfter(element);
			}
		}, // end error placement
	});

	formStep3.validate({
		rules: {
			"contact-name": "required",
			"contact-email-address": "required",
			"contact-phone-no": "required",
			number: "required",
			// message: "required"
		},
		messages: {
			"contact-name": "Ange giltigt kontaktnamn",
			"contact-email-address": "Ange giltig e-postadress för kontakt",
			"contact-phone-no": "Ange giltigt kontakttelefonnummer",
			number: "Ange giltigt nummer",
			// message: "Ange ett meddelande"
		},
	});

	//click events
	$("#step1Next").click(() => {
		tabArray[0].style.display = "none";
		showTab(1);
	});

	$("#step2Prev").click(() => {
		showTab(0);
		hideformtab(formStep1);
	});
	$("#step2Next").click(() => {
		if (formStep1.valid() === false) {
			return;
		} else {
			hideformtab(formStep1);
			showTab(2);
		}
	});

	$("#step3Prev").click(() => {
		showTab(1);
		hideformtab(formStep2);
	});
	$("#step3Next").click(() => {
		if (formStep2.valid() === false) {
			return;
		} else {
			hideformtab(formStep2);
			showTab(3);
		}
	});

	$("#step4Prev").click(() => {
		showTab(2);
		hideformtab(formStep3);
	});

	$("#step4Next").click((e) => {
		if (formStep3.valid() === false) {
			return;
		}
		hideformtab(formStep3);
		showTab(4);

		e.preventDefault();

		$fomeOne = $("form[data-form2-step='one']");
		$fomeTwo = $("form[data-form2-step='two']");
		$fomeThree = $("form[data-form2-step='three']");

		var organisationName = $fomeOne.find("[name='org-name']").val();
		var websiteURL = $fomeOne.find("[name='webiste-url']").val();
		var emailAddress = $fomeOne.find("[name='email-address']").val();
		var socialMedia = $fomeOne.find("[name='social-link']").val();
		var city = $fomeOne.find("[name='city']").val();
		var socialMedia = $fomeOne.find("[name='social-link']").val();

		var whoAreYou = $fomeTwo.find("[name='who-are-you']").val();
		var orgGoals = $fomeTwo.find("[name='org-goals']").val();
		var orgBusiness = $fomeTwo.find("[name='org-business']").val();
		var orgContribute = $fomeTwo.find("[name='org-contribute']").val();
		// var eventConcerns = $fomeOne.find("[name='eventConcerns']");

		var contactName = $fomeThree.find("[name='contact-name']").val();
		var contactEmail = $fomeThree.find("[name='contact-email-address']").val();
		var contactPhone = $fomeThree.find("[name='contact-phone-no']").val();
		// var corporate = $fomeThree.find("[name='number']").val();
		var message = $fomeThree.find("[name='message']").val();

		var issues = $("[name='issues[]']:checkbox:checked");
            var issuesArray = [];
            
		
		// var data = {
		// 	organisationName: organisationName,
		// 	websiteURL: websiteURL,
		// 	emailAddress: emailAddress,
		// 	socialMedia: socialMedia,
		// 	city: city,
		// 	socialMedia: socialMedia,
		// 	description: description,
		// 	contactName: contactName,
		// 	contactEmail: contactEmail,
		// 	contactPhone: contactPhone,
		// 	corporate: corporate,
		// 	message: message,
		// 	action: "createOrganisation",
		// };

		var fd = new FormData();
		fd.append("organisationName",organisationName);
		fd.append("websiteURL",websiteURL);
		fd.append("emailAddress",emailAddress);
		fd.append("socialMedia",socialMedia);
		fd.append("city",city);
		// fd.append("socialMedia",socialMedia);
		fd.append("whoAreYou",whoAreYou);
		fd.append("orgGoals",orgGoals);
		fd.append("orgBusiness",orgBusiness);
		fd.append("orgContribute",orgContribute);
		fd.append("contactName",contactName);
		fd.append("contactEmail",contactEmail);
		fd.append("contactPhone",contactPhone);
		// fd.append("corporate",corporate);
		fd.append("message",message);
		// fd.append("issues",JSON.stringify(issuesArray));
		fd.append("action","createOrganisation");
		issues.each(function(index,element){
			issuesArray.push(element.value);
			fd.append("issues[]",element.value);
		});
		
		if($("#logo").val() != "")
		{
			var file = $("#logo")[0];
			fd.append("file",file.files[0]);
		}
		

		$.ajax({
			url: siteURL + "/wp-admin/admin-ajax.php",
			type: "POST",
			data: fd,
			processData:false,
			contentType:false
		}).then(function (reply) {
			showTab(4);
		});
	});
}
//upload buttons
$(function () {
	$(".org-upload-link").on("click", function (e) {
		e.preventDefault();
		$(".upload:hidden").trigger("click");
	});
	$(".org-upload").change(function () {
		$(".org-upload-file-name").text(this.files[0].name);
	});
});
