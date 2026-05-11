document.addEventListener('DOMContentLoaded', () => {
	const titleInput = document.getElementById('meta-title');
	const descriptionInput = document.getElementById('meta-description');
	const urlInput = document.getElementById('meta-url');
	const robotsInput = document.getElementById('meta-robots');

	const output = document.getElementById('meta-output');
	const generateButton = document.getElementById('meta-generate-button');
	const copyButton = document.getElementById('meta-copy-button');
	const clearButton = document.getElementById('meta-clear-button');
	const message = document.getElementById('meta-message');

	if (!titleInput || !descriptionInput || !urlInput || !robotsInput || !output || !generateButton) {
		return;
	}

	function escapeHTML(value) {
		return value
			.replace(/&/g, '&amp;')
			.replace(/"/g, '&quot;')
			.replace(/</g, '&lt;')
			.replace(/>/g, '&gt;');
	}

	function showMessage(text, isError = false) {
		if (!message) return;
		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function generateMetaTags() {
		const title = titleInput.value.trim();
		const description = descriptionInput.value.trim();
		const url = urlInput.value.trim();
		const robots = robotsInput.value;

		if (!title && !description && !url) {
			output.value = '';
			showMessage('Please enter at least one field to generate meta tags.', true);
			return;
		}

		const tags = [];

		if (title) {
			tags.push(`<title>${escapeHTML(title)}</title>`);
			tags.push(`<meta property="og:title" content="${escapeHTML(title)}">`);
			tags.push(`<meta name="twitter:title" content="${escapeHTML(title)}">`);
		}

		if (description) {
			tags.push(`<meta name="description" content="${escapeHTML(description)}">`);
			tags.push(`<meta property="og:description" content="${escapeHTML(description)}">`);
			tags.push(`<meta name="twitter:description" content="${escapeHTML(description)}">`);
		}

		if (url) {
			tags.push(`<link rel="canonical" href="${escapeHTML(url)}">`);
			tags.push(`<meta property="og:url" content="${escapeHTML(url)}">`);
		}

		if (robots) {
			tags.push(`<meta name="robots" content="${escapeHTML(robots)}">`);
		}

		tags.push('<meta property="og:type" content="website">');
		tags.push('<meta name="twitter:card" content="summary_large_image">');

		output.value = tags.join('\n');
		showMessage('Meta tags generated successfully.');
	}

	generateButton.addEventListener('click', generateMetaTags);

	copyButton?.addEventListener('click', async () => {
		if (!output.value) {
			showMessage('Nothing to copy yet.', true);
			return;
		}

		try {
			await navigator.clipboard.writeText(output.value);
			showMessage('Meta tags copied to clipboard.');
		} catch (error) {
			output.select();
			document.execCommand('copy');
			showMessage('Meta tags copied to clipboard.');
		}
	});

	clearButton?.addEventListener('click', () => {
		titleInput.value = '';
		descriptionInput.value = '';
		urlInput.value = '';
		robotsInput.value = 'index, follow';
		output.value = '';
		showMessage('');
		titleInput.focus();
	});
});