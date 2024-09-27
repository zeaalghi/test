document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('popup-modal');
    const closeBtn = document.getElementById('close-btn');

    function closeModal() {
        modal.style.display = 'none';
    }

    closeBtn.addEventListener('click', closeModal);

    window.addEventListener('click', function (e) {
        if (e.target === modal) {
            closeModal();
        };
    });

    window.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
        };
    });
});