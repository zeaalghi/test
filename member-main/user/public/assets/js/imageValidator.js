document.addEventListener('DOMContentLoaded', function () {
    const uploadKtp = document.getElementById('upload-ktp');
    const ktpPreview = document.getElementById('ktp-preview');

    const uploadFoto = document.getElementById('upload-foto');
    const fotoPreview = document.getElementById('foto-preview');

    const uploadTruk = document.getElementById('upload-truk');
    const trukPreview = document.getElementById('truk-preview');
    
    const errorMessageKtp = document.getElementById('error-message-ktp');
    const errorMessageFoto = document.getElementById('error-message-foto');
    const errorMessageTruk = document.getElementById('error-message-truk');

    uploadFoto.addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file) {
            // Validate file size
            if (file.size < 100 * 1024 || file.size > 2 * 1024 * 1024) {
                errorMessageFoto.textContent = 'Image must be between 100 KB and 2 MB.';
                uploadFoto.value = ''; // Clear the input
            } else {
                errorMessageFoto.textContent = ''; // Clear any previous error messages

                // Display the uploaded image
                const reader = new FileReader();
                reader.onload = function (e) {
                    fotoPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    });

    uploadTruk.addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file) {
            // Validate file size
            if (file.size < 100 * 1024 || file.size > 2 * 1024 * 1024) {
                errorMessageTruk.textContent = 'Image must be between 100 KB and 2 MB.';
                uploadTruk.value = ''; // Clear the input
            } else {
                errorMessageTruk.textContent = ''; // Clear any previous error messages

                // Display the uploaded image
                const reader = new FileReader();
                reader.onload = function (e) {
                    trukPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    });

    uploadKtp.addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file) {
            // Validate file size
            if (file.size < 100 * 1024 || file.size > 2 * 1024 * 1024) {
                errorMessageKtp.textContent = 'Image must be between 100 KB and 2 MB.';
                uploadKtp.value = ''; // Clear the input
            } else {
                errorMessageKtp.textContent = ''; // Clear any previous error messages

                // Display the uploaded image
                const reader = new FileReader();
                reader.onload = function (e) {
                    ktpPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    });
});