const form = document.querySelector('form');
const inputs = document.querySelectorAll('form > input');

inputs.forEach(input => {
    const errorNode = input.previousElementSibling.previousElementSibling;
    input.addEventListener('blur', function(evt) {
        if(input.validity.valid) {
            errorNode.textContent = '';
            errorNode.className = 'error';
        } else {
            evt.preventDefault();
            showError(input, errorNode); 
        }
    });
});

function showError(input, errorNode) {
    if(input.type === 'text') {
        if(input.validity.valueMissing) {
            errorNode.textContent = 'Bitte tragen Sie einen Namen ein.'
        } else if(input.validity.patternMismatch) {
            errorNode.textContent = 'Bitte tragen Sie einen gültigen Namen ein. Zahlen und Sonderzeichen sind nicht erlaubt.'
        }
    } else if(input.type === 'email') {
        if(input.validity.valueMissing) {
            errorNode.textContent = 'Bitte tragen Sie eine E-Mail-Adresse ein.';
        } else if(input.validity.typeMismatch) {
            errorNode.textContent = 'Bitte tragen Sie eine gültige E-Mail-Adresse ein.';
        }
    }
    errorNode.className = 'error active';
}

function onSubmit(token) {
    document.querySelector("form").submit();
}