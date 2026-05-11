document.addEventListener('DOMContentLoaded', () => {
	const lengthInput = document.getElementById('password-length');
	const uppercaseInput = document.getElementById('password-uppercase');
	const lowercaseInput = document.getElementById('password-lowercase');
	const numbersInput = document.getElementById('password-numbers');
	const symbolsInput = document.getElementById('password-symbols');

	const generateButton = document.getElementById('password-generate-button');
	const copyButton = document.getElementById('password-copy-button');
	const clearButton = document.getElementById('password-clear-button');

	const output = document.getElementById('password-output');
	const results = document.getElementById('password-results');
	const strengthOutput = document.getElementById('password-strength');
	const characterTypesOutput = document.getElementById('password-character-types');
	const message = document.getElementById('password-message');

	if (!lengthInput || !generateButton || !output) {
		return;
	}

	const characterSets = {
		uppercase: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
		lowercase: 'abcdefghijklmnopqrstuvwxyz',
		numbers: '0123456789',
		symbols: '!@#$%^&*()_+-=[]{}|;:,.<>?',
	};

	function showMessage(text, isError = false) {
		if (!message) return;
		message.textContent = text;
		message.style.color = isError ? '#b42318' : '#0f8f68';
	}

	function getRandomCharacter(characters) {
		const randomIndex = Math.floor(Math.random() * characters.length);
		return characters[randomIndex];
	}

	function shuffleString(value) {
		return value
			.split('')
			.sort(() => Math.random() - 0.5)
			.join('');
	}

	function getStrength(length, selectedTypes) {
		if (length >= 20 && selectedTypes >= 4) return 'Very Strong';
		if (length >= 16 && selectedTypes >= 3) return 'Strong';
		if (length >= 12 && selectedTypes >= 2) return 'Moderate';
		return 'Weak';
	}

	function generatePassword() {
		const length = parseInt(lengthInput.value, 10);

		const selectedSets = [];

		if (uppercaseInput.checked) selectedSets.push(characterSets.uppercase);
		if (lowercaseInput.checked) selectedSets.push(characterSets.lowercase);
		if (numbersInput.checked) selectedSets.push(characterSets.numbers);
		if (symbolsInput.checked) selectedSets.push(characterSets.symbols);

		if (!length || length < 8 || length > 64) {
			output.value = '';
			results.hidden = true;
			showMessage('Please choose a password length between 8 and 64.', true);
			return;
		}

		if (selectedSets.length === 0) {
			output.value = '';
			results.hidden = true;
			showMessage('Please select at least one character type.', true);
			return;
		}

		let password = '';

		selectedSets.forEach((set) => {
			password += getRandomCharacter(set);
		});

		const allCharacters = selectedSets.join('');

		while (password.length < length) {
			password += getRandomCharacter(allCharacters);
		}

		password = shuffleString(password).slice(0, length);

		output.value = password;
		strengthOutput.textContent = getStrength(length, selectedSets.length);
		characterTypesOutput.textContent = selectedSets.length;
		results.hidden = false;

		showMessage('Password generated successfully.');
	}

	generateButton.addEventListener('click', generatePassword);

	copyButton?.addEventListener('click', async () => {
		if (!output.value) {
			showMessage('Nothing to copy yet.', true);
			return;
		}

		try {
			await navigator.clipboard.writeText(output.value);
			showMessage('Password copied to clipboard.');
		} catch (error) {
			output.select();
			document.execCommand('copy');
			showMessage('Password copied to clipboard.');
		}
	});

	clearButton?.addEventListener('click', () => {
		output.value = '';
		results.hidden = true;
		showMessage('');
		lengthInput.focus();
	});

	generatePassword();
});