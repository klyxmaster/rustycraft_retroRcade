document.addEventListener('DOMContentLoaded', function () {
	var form = document.getElementById('gameForm');
	form.addEventListener('submit', function (e) {
		// Prevent the default form submission
		e.preventDefault();

		// Get the selected option text
		var select = document.getElementById('gameList');
		var selectedText = select.options[select.selectedIndex].text;

		// Set the value of a hidden input field or create one if it doesn't exist
		var hiddenInput = document.getElementById('selectedGameName');
		if (!hiddenInput) {
			hiddenInput = document.createElement('input');
			hiddenInput.setAttribute('type', 'hidden');
			hiddenInput.setAttribute('id', 'selectedGameName');
			hiddenInput.setAttribute('name', 'selectedGameName');
			form.appendChild(hiddenInput);
		}
		hiddenInput.value = selectedText;

		// Continue with the form submission
		form.submit();
	});
});