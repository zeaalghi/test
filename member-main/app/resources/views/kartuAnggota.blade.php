<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/img/logo 4.svg') }}" rel="icon">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <title>DKWB</title>
</head>

<body class="" style="font-family: Plus Jakarta Sans">
    <div id="kartu-anggota">
        <section>
            <div class="relative h-[638px] w-[1063px] mx-auto my-20 border border-gray-300 shadow-lg rounded-lg"
                style="background-image: url('{{ asset('assets/kartu/depan.svg') }}')">
                <!-- Header -->
                <div class="p-4 flex justify-end absolute w-[1063px]">
                    <img src="{{ asset('assets/kartu/dkwbl.svg') }}" alt="">
                </div>
                <div class="w-[1063px] flex px-20 gap-8 mt-28 items-center absolute">
                    <!-- Avatar -->
                    <img class="h-80 w-72 rounded-full border-2 bg-white"
                        src="{{ asset('storage/profile/' . $dataDriver->images->first()->filepath) }}" alt="">
                    <!-- Teks -->
                    <div class="p-4">
                        <p class="text-3xl font-bold mb-4">Asosiasi Driver Kota Wisata Batu</p>
                        <p class="text-6xl font-bold uppercase mb-4">{{ $dataDriver->fullname }}</p>
                        <p class="text-4xl font-bold uppercase mb-4">{{ $dataDriver->memberid }}</p>
                    </div>
                </div>
                <div class="absolute p-4 bottom-0 w-[1063px] flex items-end justify-end">
                    <div class="text-end p-4 uppercase">
                        <p class="text-3xl font-bold">NOMOR AHU-0004089.AH.01.07.TAHUN 2022</p>
                        <p class="text-3xl font-bold">Akta NOMOR 19 TANGGAL 19 MARET 2022</p>
                        <p class="text-3xl font-bold">NPWP 65.244.173.4-628-000</p>
                        <p class="text-3xl font-bold">Site D-KWB.com</p>
                    </div>
                    {{-- <img class="h-52" src="{{ asset('storage/qrcodes/'.$dataDriver->id.'.png') }}" alt=""> --}}
                    @if (Storage::exists('public/qrcodes/' . $dataDriver->memberid . '.png'))
                        <img class="h-52" src="{{ asset('storage/qrcodes/' . $dataDriver->memberid . '.png') }}"
                            alt="Cetak QR Terlebih Dahulu">
                    @else
                        <div class="h-52 w-52 grid place-items-center">
                            <a href="{{ url('qrcode/' . $dataDriver->id) }}"
                                class="px-4 py-1.5 bg-red-700 text-base text-center font-medium text-white rounded-xl hover:shadow-md">
                                Cetak QR Disini
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <div style="margin: 400px"></div>
        <section>
            <div class="h-[638px] w-[1063px] mx-auto my-20 border border-gray-300 shadow-lg rounded-lg"
                style="background-image: url('{{ asset('assets/kartu/belakang.svg') }}')">
                <div class="flex mx-auto h-full w-full">
                    <div class="px-12 py-12 w-2/6">
                        <img class="h-60 mb-10" src="{{ asset('assets/kartu/dkwbl.svg') }}" alt="">
                        <img class="h-60" src="{{ asset('assets/kartu/legalitas.svg') }}" alt="">
                    </div>
                    <div class="w-4/6">
                        <div class="mt-12 mb-5 text-center">
                            <p class="uppercase text-3xl font-bold underline">Perhatian</p>
                        </div>
                        <div class="text-2xl font-bold">
                            <p class="mb-4">
                                1. Kartu Anggota Asosiasi D-KWB ini berlaku selama 3 tahun sejak diterbitkan dan mempunyai
                                status sebagai Anggota Resmi Asosiasi D-KWB.
                            </p>
                            <p class="mb-4">
                                2. Penyalahgunaan penggunaan kartu anggota ini ditanggung masing2 individu pemilik kartu.
                            </p>
                            <p class="mb-4">
                                3. Kartu Anggota Wajib diperlihatkan di setiap acara resmi Asosiasi D-KWB.
                            </p>
                            <p class="mb-4">
                                4. Apabila Kartu Anggota Hilang akan dikenakan Denda Penggantian Kartu anggota Sebesar Rp
                                100.000,-.
                            </p>
                        </div>
                        <div class="pt-2 text-end px-20 text-base font-bold">
                            <p>{{ $tanggal }}</p>
                            <p>Ketua Umum</p>
                            <div class="flex justify-end">
                                <img width="79" height="63" src="{{ asset('storage/images/'.$ttd) }}" alt="">
                            </div>
                            <p>{{ $ketua }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <button onclick="downloadPDF()" class="fixed bottom-10 right-10 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Download PDF</button>
    <script>
        function downloadPDF() {
            const element = document.getElementById('kartu-anggota');
            html2pdf(element, {
                margin: 0,
                filename: 'Kartu_Anggota.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: [10.63, 12.76], orientation: 'landscape' }
            });
        }
    </script>
</body>

</html>
