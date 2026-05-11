document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('word-counter-input');
    const wordCount = document.getElementById('word-count');
    const characterCount = document.getElementById('character-count');

    if (input) {
        input.addEventListener('input', () => {
            const text = input.value.trim();

            wordCount.textContent = text ? text.split(/\s+/).length : 0;
            characterCount.textContent = text.length;
        });
    }
});