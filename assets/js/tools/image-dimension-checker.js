document.addEventListener('DOMContentLoaded', () => {
	const input = document.getElementById('image-dimension-input');
	const results = document.getElementById('image-dimension-results');
	const message = document.getElementById('image-dimension-message');

	const fileNameOutput = document.getElementById('image-file-name');
	const fileTypeOutput = document.getElementById('image-file-type');
	const fileSizeOutput = document.getElementById('image-file-size');
	const widthOutput = document.getElementById('image-width');
	const heightOutput = document.getElementById('image-height');
	const aspectRatioOutput = document.getElementById('image-aspect-ratio');

	const previewWrap = document.getElementById('image-preview-wrap');
	const preview = document.getElementById('image-preview');

	if (!input || !results) {
		return;
	}

	function showMessage(text, isError = false) {
		if (!message) return;
		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function formatFileSize(bytes) {
		if (bytes < 1024) {
			return `${bytes} B`;
		}

		if (bytes < 1024 * 1024) {
			return `${(bytes / 1024).toFixed(2)} KB`;
		}

		return `${(bytes / (1024 * 1024)).toFixed(2)} MB`;
	}

	function getGCD(a, b) {
		a = Math.abs(a);
		b = Math.abs(b);

		while (b !== 0) {
			const temp = b;
			b = a % b;
			a = temp;
		}

		return a;
	}

	function getAspectRatio(width, height) {
		const gcd = getGCD(width, height);
		return `${width / gcd}:${height / gcd}`;
	}

	input.addEventListener('change', () => {
		const file = input.files && input.files[0];

		if (!file) {
			results.hidden = true;
			previewWrap.hidden = true;
			showMessage('');
			return;
		}

		if (!file.type.startsWith('image/')) {
			results.hidden = true;
			previewWrap.hidden = true;
			showMessage('Please choose a valid image file.', true);
			return;
		}

		const imageUrl = URL.createObjectURL(file);
		const image = new Image();

		image.onload = () => {
			const width = image.naturalWidth;
			const height = image.naturalHeight;

			fileNameOutput.textContent = file.name;
			fileTypeOutput.textContent = file.type || 'Unknown';
			fileSizeOutput.textContent = formatFileSize(file.size);
			widthOutput.textContent = `${width}px`;
			heightOutput.textContent = `${height}px`;
			aspectRatioOutput.textContent = getAspectRatio(width, height);

			preview.src = imageUrl;
			previewWrap.hidden = false;
			results.hidden = false;

			showMessage('Image dimensions checked successfully.');
		};

		image.onerror = () => {
			URL.revokeObjectURL(imageUrl);
			results.hidden = true;
			previewWrap.hidden = true;
			showMessage('Could not read this image. Please try another file.', true);
		};

		image.src = imageUrl;
	});
});