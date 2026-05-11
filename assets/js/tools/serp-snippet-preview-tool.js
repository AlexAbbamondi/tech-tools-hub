/*

grab inputs
grab preview elements
on input:
	update preview text
	update character counts
	show warnings if needed

*/

document.addEventListener('DOMContentLoaded', function() {
	const titleInput = document.getElementById('serp-title');
	const urlInput = document.getElementById('serp-url');
	const descriptionInput = document.getElementById('serp-description');

	const titlePreview = document.getElementById('serp-preview-title');
	const urlPreview = document.getElementById('serp-preview-url');
	const descriptionPreview = document.getElementById('serp-preview-description');
	const titleCharCount = document.getElementById('serp-title-count');
	const descriptionCharCount = document.getElementById('serp-description-count');

	function updatePreview() {
		const title = titleInput.value;
		const url = urlInput.value;
		const description = descriptionInput.value;

		titlePreview.textContent = title;
		urlPreview.textContent = url;
		descriptionPreview.textContent = description;

		titleCharCount.textContent = title.length;
		descriptionCharCount.textContent = description.length;

		if (title.length > 60) {
			titleCharCount.style.color = 'red';
		} else {
			titleCharCount.style.color = '';
		}
		if (description.length > 160) {
			descriptionCharCount.style.color = 'red';
		} else {
			descriptionCharCount.style.color = '';
		}

	}

	titleInput.addEventListener('input', updatePreview);
	urlInput.addEventListener('input', updatePreview);
	descriptionInput.addEventListener('input', updatePreview);
});