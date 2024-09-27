document.addEventListener('DOMContentLoaded', function () {
    const uploadAvatar = document.getElementById('upload-avatar');
    const avatarPreview = document.getElementById('avatar-preview');
    const uploadTruk = document.getElementById('upload-truk');
    const trukPreview = document.getElementById('truk-preview');
    const errorMessage = document.getElementById('error-message');

    uploadAvatar.addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file) {
            // Validate file size
            if (file.size < 100 * 1024 || file.size > 2 * 1024 * 1024) {
                errorMessage.textContent = 'Image must be between 100 KB and 2 MB.';
                uploadAvatar.value = ''; // Clear the input
            } else {
                errorMessage.textContent = ''; // Clear any previous error messages

                // Display the uploaded image
                const reader = new FileReader();
                reader.onload = function (e) {
                    avatarPreview.src = e.target.result;
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
                errorMessage.textContent = 'Image must be between 100 KB and 2 MB.';
                uploadTruk.value = ''; // Clear the input
            } else {
                errorMessage.textContent = ''; // Clear any previous error messages

                // Display the uploaded image
                const reader = new FileReader();
                reader.onload = function (e) {
                    trukPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
        var submitBtn = document.getElementById('submit-truk');
        if (this.files && this.files.length > 0) {
            submitBtn.classList.remove('hidden');
        } else {
            submitBtn.classList.add('hidden');
        }
    });
});