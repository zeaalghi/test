function validatePhone() {
    const phoneInput = document.getElementById('no_telepon');
    let warningParagraph = document.getElementById('phone-warning-message');

    const phone = phoneInput.value;
    const isValid = /^0\d{9,12}$/.test(phone);

    if (!warningParagraph) {
        // Create a new paragraph element if it doesn't exist
        warningParagraph = document.createElement('p');
        warningParagraph.id = 'phone-warning-message';
        warningParagraph.className = 'mt-2 text-sm';
        phoneInput.parentNode.appendChild(warningParagraph);
    }

    if (isValid) {
        warningParagraph.textContent = 'Nomor telepon valid';
        warningParagraph.classList.remove('text-red-600'); // Remove red text class
        warningParagraph.classList.add('text-green-600'); // Add green text class
    } else {
        // Display appropriate warning message based on condition
        if (phone.length < 10) {
            warningParagraph.textContent = 'Nomor telepon harus terdiri dari minimal 10 digit.';
        } else if (phone.length > 13) {
            warningParagraph.textContent = 'Nomor telepon tidak boleh lebih dari 13 digit.';
        } else if (!/^0/.test(phone)) {
            warningParagraph.textContent = 'Nomor telepon harus dimulai dengan angka 0.';
        } else if (!/^\d+$/.test(phone)) {
            warningParagraph.textContent = 'Nomor telepon hanya boleh mengandung angka.';
        } else {
            warningParagraph.innerHTML = '&#9989; Nomor telepon valid'; // Insert emoji as Unicode character
        }
        warningParagraph.classList.remove('text-green-600'); // Remove green text class if any
        warningParagraph.classList.add('text-red-600'); // Add red text class
    }
}

function allowOnlyNumbers(event) {
    const keyCode = event.keyCode || event.which;
    const keyValue = String.fromCharCode(keyCode);
    if (!/^\d$/.test(keyValue) && keyCode !== 8 && keyCode !== 46) {
        event.preventDefault();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('no_telepon');

    phoneInput.addEventListener('input', validatePhone);
    phoneInput.addEventListener('keypress', allowOnlyNumbers);

    validatePhone(); // Initial check when the page loads
});
