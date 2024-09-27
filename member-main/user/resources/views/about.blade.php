@extends('master')
@section('content')
    <section>
        <div class="container mx-auto py-24">
            <h1 class="px-10 text-xl font-bold text-slate-900">Tentang Kami</h1>
            <div class="mx-10 my-5 py-3 rounded-xl">
                <p class="mb-4">
                    DKWB, atau Driver Kota Wisata Batu, adalah asosiasi profesional yang mewadahi komunitas sopir di Kota
                    Batu dan sekitarnya. Dengan visi untuk menjadi yang terbaik dalam industri logistik Indonesia, kami
                    berkomitmen untuk terus berinovasi dan menyediakan layanan logistik yang unggul. Misi kami adalah
                    menyediakan tempat berkumpul yang profesional bagi komunitas sopir, agar mereka dapat saling mendukung,
                    berinteraksi, dan memperoleh informasi terbaru terkait profesi mereka. Dari Sabang hingga Merauke, kami
                    berkomitmen untuk menyediakan layanan logistik terbaik di seluruh Indonesia.
                </p>
                <p class="mb-4">
                    DKWB sendiri telah terdaftar secara resmi dan legal di Menteri Hukum dan Hak Asasi Manusia Republik
                    Indonesia dengan disahkan Tanggal 26 April 2022 dengan nomor AHU-0004089.AH.01.07.Tahun 2022 dengan Akta
                    Notaris No 19 Tanggal 19 Maret 2022. DKWB mempunyai anggota saat ini +200 orang yang akan bertambah
                    terus karena proses requitment anggota masih berjalan.
                </p>
                <p class="mb-4">
                    Program kerja dari Asosiasi DKWB antara lain meliputi
                <ul class="list-disc ml-5">
                    <li class="ml-0">Menyediakan tempat bernaung bagi anggota profesi untuk bertukar informasi mengenai
                        regulasi dan
                        peraturan perundang-undangan tentang sopir dan angkutan
                        logistik</li>

                    <li class="ml-0">Menyediakan informasi tentang peluang pekerjaan dalam pengiriman logistik di seluruh
                        Indonesia
                        dengan membangun aplikasi penyediaan angkutan logistik berupa website order online</li>
                    <li class="ml-0">Memberikan
                        pertolongan pertama pada kendaraan yang mengalami masalah baik di dalam maupun di luar wilayah Kota
                        Batu, baik untuk kendaraan anggota maupun non-anggota (STORING)</li>
                    <li class="ml-0">Menyediakan wadah bagi istri atau
                        pasangan anggota untuk pelatihan dan keterampilan kewirausahaan, serta manajemen keuangan yang
                        dihasilkan oleh suami sebagai sopir</li>
                    <li class="ml-0">Menyediakan wadah bagi pelajar SMK dan mahasiswa untuk praktik
                        kerja lapangan tentang perawatan dan pengoperasian mesin truk besar serta penataan muatan logistik
                        ke
                        dalam truk</li>
                    <li class="ml-0">Mengadakan kegiatan sosial serta keagamaan untuk anggota asosiasi DKWB</li>
                </ul>
                </p>
            </div>
            <div class="mx-10 my-5 py-3 rounded-xl">
                <a href="{{ asset('assets/legalitas/KBLI 49431 ANGKUTAN BERMOTOR UNTUK BARANG UMUM.pdf') }}"
                    target="_blank">
                    <div class="flex items-center gap-3">
                        <span
                            class="inline-flex items-center py-2 text-base font-medium text-center text-red-700 rounded-lg hover:text-red-800">
                            Cek Legalitas
                        </span>
                        <span class="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6 text-red-700 font-medium">
                                <path
                                    d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                                </path>
                            </svg>
                        </span>
                    </div>
                </a>
            </div>

            <div id="popup-modal" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center items-center">
                            <img src="{{ asset('assets/img/dkwb.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
