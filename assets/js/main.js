(function () {
	'use strict';

	function parseValue(input) {
		var value = parseFloat(input.value);
		return Number.isFinite(value) ? value : null;
	}

	function calculate(a, b, operator) {
		switch (operator) {
			case '+':
				return a + b;
			case '-':
				return a - b;
			case '*':
				return a * b;
			case '/':
				if (b === 0) {
					return null;
				}
				return a / b;
			default:
				return null;
		}
	}

	function initCalculator(form) {
		var inputA = form.querySelector('input[name="a"]');
		var inputB = form.querySelector('input[name="b"]');
		var operator = form.querySelector('select[name="op"]');
		var resultEl = form.querySelector('.tth-calculator__result');

		if (!inputA || !inputB || !operator || !resultEl) {
			return;
		}

		form.addEventListener('submit', function (event) {
			event.preventDefault();

			var a = parseValue(inputA);
			var b = parseValue(inputB);
			var operation = operator.value;

			if (a === null || b === null) {
				resultEl.textContent = 'Please enter valid numbers.';
				return;
			}

			var answer = calculate(a, b, operation);

			if (answer === null) {
				resultEl.textContent = 'Calculation failed. Check your values.';
				return;
			}

			resultEl.textContent = 'Result: ' + answer;
		});
	}

	document.addEventListener('DOMContentLoaded', function () {
		var calculators = document.querySelectorAll('[data-calculator]');
		calculators.forEach(initCalculator);
	});
})();
