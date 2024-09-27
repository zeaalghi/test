function validateNIK() {
    const nikInput = document.getElementById('nik');
    const submitButton = document.getElementById('submit-button');
    let warningParagraph = document.getElementById('warning-message');

    const nik = nikInput.value;
    const isValid = /^\d{16}$/.test(nik);

    if (!warningParagraph) {
        // Buat elemen paragraf baru jika belum ada
        // warningParagraph = document.createElement('p');
        // warningParagraph.id = 'warning-message';
        // warningParagraph.className = 'mt-2 text-sm';
        // nikInput.parentNode.appendChild(warningParagraph);
    }

    if (isValid) {
        submitButton.disabled = false;
        submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
        submitButton.classList.add('hover:bg-blue-800', 'dark:hover:bg-blue-700');
        warningParagraph.textContent = 'NIK valid';
        warningParagraph.classList.remove('text-red-600'); // Hapus kelas teks merah
        warningParagraph.classList.add('text-green-600'); // Tambah kelas teks hijau
    } else {
        submitButton.disabled = true;
        submitButton.classList.add('opacity-50', 'cursor-not-allowed');
        submitButton.classList.remove('hover:bg-blue-800', 'dark:hover:bg-blue-700');
        
        // Tampilkan pesan peringatan sesuai kondisi
        if (nik.length < 16) {
            warningParagraph.textContent = 'NIK harus terdiri dari 16 digit.';
        } else if (!/^\d+$/.test(nik)) {
            warningParagraph.textContent = 'NIK hanya boleh mengandung angka.';
        } else {
            warningParagraph.innerHTML = 'NIK tidak valid'; // Insert emoji as Unicode character
        }
        warningParagraph.classList.remove('text-green-600'); // Hapus kelas teks hijau jika ada
        warningParagraph.classList.add('text-red-600'); // Tambah kelas teks merah
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
    const nikInput = document.getElementById('nik');
    nikInput.addEventListener('input', validateNIK);
    nikInput.addEventListener('keypress', allowOnlyNumbers);
    validateNIK(); // Periksa secara awal saat halaman dimuat
});
