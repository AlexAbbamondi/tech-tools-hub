document.addEventListener('DOMContentLoaded', () => {
	const sitemapInput = document.getElementById('robots-sitemap');
	const disallowInput = document.getElementById('robots-disallow');
	const wordpressDefaults = document.getElementById('robots-wordpress-defaults');

	const generateButton = document.getElementById('robots-generate-button');
	const copyButton = document.getElementById('robots-copy-button');
	const clearButton = document.getElementById('robots-clear-button');
	const output = document.getElementById('robots-output');
	const message = document.getElementById('robots-message');

	if (!generateButton || !output) return;

	function showMessage(text, isError = false) {
		if (!message) return;
		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function generateRobotsTxt() {
		const sitemap = sitemapInput.value.trim();
		const customPaths = disallowInput.value
			.split('\n')
			.map((path) => path.trim())
			.filter(Boolean);

		const lines = ['User-agent: *'];

		if (wordpressDefaults.checked) {
			lines.push('Disallow: /wp-admin/');
			lines.push('Allow: /wp-admin/admin-ajax.php');
		}

		customPaths.forEach((path) => {
			lines.push(`Disallow: ${path.startsWith('/') ? path : `/${path}`}`);
		});

		if (sitemap) {
			lines.push('');
			lines.push(`Sitemap: ${sitemap}`);
		}

		output.value = lines.join('\n');
		showMessage('Robots.txt generated successfully.');
	}

	generateButton.addEventListener('click', generateRobotsTxt);

	copyButton?.addEventListener('click', async () => {
		if (!output.value) {
			showMessage('Nothing to copy yet.', true);
			return;
		}

		try {
			await navigator.clipboard.writeText(output.value);
			showMessage('Robots.txt copied to clipboard.');
		} catch (error) {
			output.select();
			document.execCommand('copy');
			showMessage('Robots.txt copied to clipboard.');
		}
	});

	clearButton?.addEventListener('click', () => {
		sitemapInput.value = '';
		disallowInput.value = '';
		wordpressDefaults.checked = true;
		output.value = '';
		showMessage('');
		sitemapInput.focus();
	});
});