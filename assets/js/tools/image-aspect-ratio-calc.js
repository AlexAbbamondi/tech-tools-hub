document.addEventListener('DOMContentLoaded', () => {
	const widthInput = document.getElementById('aspect-width');
	const heightInput = document.getElementById('aspect-height');
	const calculateButton = document.getElementById('aspect-calculate-button');
	const message = document.getElementById('aspect-message');
	const results = document.getElementById('aspect-results');

	const originalRatio = document.getElementById('aspect-original-ratio');
	const simplifiedRatio = document.getElementById('aspect-simplified-ratio');
	const decimalRatio = document.getElementById('aspect-decimal-ratio');
	const commonRatio = document.getElementById('aspect-common-ratio');

	if (!widthInput || !heightInput || !calculateButton) {
		return;
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

	function getCommonRatioLabel(width, height) {
		const ratio = width / height;
		const commonRatios = [
			{ label: '1:1', value: 1 },
			{ label: '4:3', value: 4 / 3 },
			{ label: '3:2', value: 3 / 2 },
			{ label: '16:9', value: 16 / 9 },
			{ label: '16:10', value: 16 / 10 },
			{ label: '21:9', value: 21 / 9 },
			{ label: '9:16', value: 9 / 16 }
		];

		let closest = null;
		let smallestDifference = Infinity;

		commonRatios.forEach((item) => {
			const difference = Math.abs(ratio - item.value);

			if (difference < smallestDifference) {
				smallestDifference = difference;
				closest = item;
			}
		});

		return smallestDifference < 0.03 ? closest.label : 'Custom';
	}

	function resetResults() {
		results.hidden = true;
		originalRatio.textContent = '—';
		simplifiedRatio.textContent = '—';
		decimalRatio.textContent = '—';
		commonRatio.textContent = '—';
		message.textContent = '';
	}

	function calculateAspectRatio() {
		resetResults();

		const width = parseInt(widthInput.value, 10);
		const height = parseInt(heightInput.value, 10);

		if (!width || !height || width <= 0 || height <= 0) {
			message.textContent = 'Please enter a valid width and height.';
			return;
		}

		const gcd = getGCD(width, height);
		const simplifiedWidth = width / gcd;
		const simplifiedHeight = height / gcd;
		const decimal = (width / height).toFixed(2);
		const common = getCommonRatioLabel(width, height);

		originalRatio.textContent = `${width}:${height}`;
		simplifiedRatio.textContent = `${simplifiedWidth}:${simplifiedHeight}`;
		decimalRatio.textContent = `${decimal}:1`;
		commonRatio.textContent = common;

		results.hidden = false;
		message.textContent = 'Aspect ratio calculated successfully.';
	}

	calculateButton.addEventListener('click', calculateAspectRatio);
});