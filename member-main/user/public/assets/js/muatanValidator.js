function allowOnlyNumbers(event) {
    const keyCode = event.keyCode || event.which;
    const keyValue = String.fromCharCode(keyCode);
    if (!/^\d$/.test(keyValue) && keyCode !== 8 && keyCode !== 46) {
        event.preventDefault();
    }
}

function validateMuatan() {
    const muatanInput = document.getElementById('jumlah_muatan');
    const muatan = muatanInput.value;
}

document.addEventListener('DOMContentLoaded', function () {
    const muatanInput = document.getElementById('jumlah_muatan');
    muatanInput.addEventListener('input', validateMuatan);
    muatanInput.addEventListener('keypress', allowOnlyNumbers);
    validateMuatan(); // Periksa secara awal saat halaman dimuat
});