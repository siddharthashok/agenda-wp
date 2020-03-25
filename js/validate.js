console.log("validate function");

$("form[data-form='one']").validate({
	rules: {
		name: "required"
	},
	messages: {
		name: "Please enter valid input"
	}
});

$("#nextBtn").on("click", step1);

function step1(e) {
	e.preventDefault();
	console.log("step1 clciked");
	if ($("form[data-form='one']").valid() == false) {
		return;
	}
}
