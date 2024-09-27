document.addEventListener('DOMContentLoaded', function () {
    const contents = [
        { icon: assetPath + 'assets/slide/person.svg', text: memberid },
        { icon: assetPath + 'assets/slide/home.svg', text: birthloc + ', ' + birthdate },
        { icon: assetPath + 'assets/slide/heartrate.svg', text: statuss == 1 ? 'Aktif' : 'Non-Aktif' },
        { icon: assetPath + 'assets/slide/card.svg', text: lisence },
        { icon: assetPath + 'assets/slide/heart.svg', text: insurance },
        { icon: assetPath + 'assets/slide/truck.svg', text: 'Armada' },
        { icon: assetPath + 'assets/slide/hourglass.svg', text: pengalaman + ' Tahun' },
    ];

    let currentIdx = 0;

    document.getElementById('arrow-left').addEventListener('click', function () {
        currentIdx = (currentIdx - 1 + contents.length) % contents.length;
        updateContent();
    });

    document.getElementById('arrow-right').addEventListener('click', function () {
        currentIdx = (currentIdx + 1) % contents.length;
        updateContent();
    });

    function updateContent() {
        const contentIcon = document.getElementById('content-icon').querySelector('img');
        const contentText = document.getElementById('content-text');

        contentIcon.src = contents[currentIdx].icon;
        contentText.textContent = contents[currentIdx].text;
    }
})