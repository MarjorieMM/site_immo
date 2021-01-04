function goBack() {
	window.history.back();
}

$("#photo").on("change", function () {
	const fileName = $(this)
		.val()
		.split(/(\\|\/)/g)
		.pop();
	$(this).next(".custom-file-label").html(fileName);
});
