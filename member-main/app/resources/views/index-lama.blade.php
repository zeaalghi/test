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
    <link href="https://cdn.remixicon.com/releases/v2.1.0/remixicon.css" rel="stylesheet">
    <link href="{{ asset('assets/img/logo 4.svg') }}" rel="icon">


    <title>DKWB</title>

</head>

<body style="font-family: Plus Jakarta Sans" class="bg-gray-50">
    <header class="top-0 w-full flex items-center z-10 mb-6 shadow-sm bg-gray-50">
        <nav class="container mx-auto lg:mx-auto lg:px-10">
            <div class="flex items-center justify-between relative">
                <div class="px-2 w-[25%] lg:w-[30%]">
                    <a href="/" class="py-3 block">
                        <img src="{{ asset('assets/img/dkwbcar.svg') }}" alt="" srcset="" width="120">
                    </a>
                </div>
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse mx-4">
                    <a href="{{ route('loginDriver') }}"
                        class="px-4 py-1.5 w-full bg-red-700 text-xs font-medium text-white rounded-xl hover:shadow-md lg:w-full lg:px-8">
                        Masuk
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="relative container mx-auto">
            <div class="absolute right-20 lg:-top-24 lg:-left-28">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                    class="w-[600px] filter blur-2xl opacity-20">
                    <path fill="#F35937"
                        d="M51.5,-69.7C65.1,-60.9,73.5,-43.8,76,-26.9C78.4,-10,74.9,6.6,71,24.4C67.1,42.3,62.8,61.3,50.9,72.1C39,82.9,19.5,85.5,1.3,83.8C-17,82,-33.9,76.1,-48.1,66C-62.3,55.9,-73.6,41.8,-78.8,25.6C-84.1,9.5,-83.3,-8.7,-77,-24.1C-70.6,-39.5,-58.9,-52.1,-45.1,-60.9C-31.4,-69.7,-15.7,-74.6,1.6,-76.9C18.9,-79.1,37.8,-78.6,51.5,-69.7Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="absolute top-[640px] -left-[250px] lg:top-48 lg:left-[55%]">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                    class="w-[600px] filter blur-2xl opacity-20">
                    <path fill="#F35937"
                        d="M51.5,-69.7C65.1,-60.9,73.5,-43.8,76,-26.9C78.4,-10,74.9,6.6,71,24.4C67.1,42.3,62.8,61.3,50.9,72.1C39,82.9,19.5,85.5,1.3,83.8C-17,82,-33.9,76.1,-48.1,66C-62.3,55.9,-73.6,41.8,-78.8,25.6C-84.1,9.5,-83.3,-8.7,-77,-24.1C-70.6,-39.5,-58.9,-52.1,-45.1,-60.9C-31.4,-69.7,-15.7,-74.6,1.6,-76.9C18.9,-79.1,37.8,-78.6,51.5,-69.7Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="mx-4 none">
                <div class="mx-auto mt-16 lg:w-[75%]">
                    <h1 class="text-3xl lg:text-5xl lg:text-center font-medium mb-1 lg:mb-5">Kami memberikan <span
                            class="bg-[#de3a3a] text-white px-1 rounded-xl">solusi</span> untuk</h1>
                    <h1 class="text-3xl lg:text-5xl lg:text-center font-medium">mengatasi pengiriman barang Anda.</span>
                    </h1>
                    <p
                        class="text-sm lg:text-lg lg:text-center w-[86%] lg:mx-auto lg:mt-8 mt-4 font-medium text-[#787878]">
                        Solusi terbaik
                        pengiriman barang anda biar kami yang atasi. Tinggal sat set wat wet barang pun sampai tujuan.
                        Tidak perlu ribet cukup klak klik aja bolo👍</p>
                </div>
                <div class="lg:flex mt-14 lg:mt-8 justify-center lg:gap-10">
                    <div class="flex items-center border-2 p-4 lg:px-5 rounded-xl mb-4 border-[#de3a3a]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-10 lg:w-6 lg:h-5 mr-3 text-[#de3a3a]">
                            <path
                                d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM17.3628 15.2332C20.4482 16.0217 22.7679 18.7235 22.9836 22H20C20 19.3902 19.0002 17.0139 17.3628 15.2332ZM15.3401 12.9569C16.9728 11.4922 18 9.36607 18 7C18 5.58266 17.6314 4.25141 16.9849 3.09687C19.2753 3.55397 21 5.57465 21 8C21 10.7625 18.7625 13 16 13C15.7763 13 15.556 12.9853 15.3401 12.9569Z">
                            </path>
                        </svg>
                        <h1 class="text-base lg:text-sm font-semibold text-[#de3a3a] mr-2 lg:mr-1">{{ $driversTotal }}
                        </h1>
                        <h1 class="text-base lg:text-sm font-semibold text-[#de3a3a]">TOTAL DRIVER</h1>
                    </div>
                    <div class="flex items-center border-2 p-4 lg:px-5 rounded-xl mb-4 border-[#de3a3a]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-10 lg:w-6 lg:h-8 mr-3 text-[#de3a3a]">
                            <path
                                d="M1 5C1 4.44772 1.44772 4 2 4H22C22.5523 4 23 4.44772 23 5V19C23 19.5523 22.5523 20 22 20H2C1.44772 20 1 19.5523 1 19V5ZM13 8V10H19V8H13ZM18 12H13V14H18V12ZM10.5 10C10.5 8.61929 9.38071 7.5 8 7.5C6.61929 7.5 5.5 8.61929 5.5 10C5.5 11.3807 6.61929 12.5 8 12.5C9.38071 12.5 10.5 11.3807 10.5 10ZM8 13.5C6.067 13.5 4.5 15.067 4.5 17H11.5C11.5 15.067 9.933 13.5 8 13.5Z">
                            </path>
                        </svg>
                        <h1 class="text-base lg:text-sm font-semibold text-[#de3a3a] mr-2 lg:mr-1">
                            {{ $driverActive->count() }}</h1>
                        <h1 class="text-base lg:text-sm font-semibold text-[#de3a3a]">DRIVER ACTIVE</h1>
                    </div>
                </div>
            </div>
            {{-- <a href="preview">cek qr</a>
            <div>
                <a href="driver">cek kartu anggota</a>
            </div> --}}
        </div>
    </section>

    <section class="none">
        <div class="container mt-20 flex justify-center lg:mx-auto gap-10">
            <div class="relative overflow-y-auto lg:w-[70%] mb-20 rounded-xl">
                <div
                    class="lg:flex lg:items-center lg:justify-between lg:max-h-[300px] px-10 py-5 md:flex-row space-y-4 md:space-y-0 pb-4 bg-white">
                    <div>
                        <h1 class="text-lg font-semibold text-gray-800">Driver</h1>
                    </div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search-users"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-64 bg-gray-50 focus:ring-red-500 focus:border-red-500"
                            placeholder="Cari driver anda">
                    </div>
                </div>
                <table class="lg:w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="hidden lg:block lg:px-6 lg:py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drivers as $driver)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                    <div class="lg:w-full w-40">
                                        <p class="text-sm font-semibold overflow-x-auto whitespace-nowrap">
                                            {{ $driver->fullname }}</p>
                                        <div class="text-xs text-gray-500">{{ $driver->memberid }}</div>
                                    </div>
                                </th>
                                <td class="hidden lg:block lg:px-6 lg:py-4">
                                    <div class="flex items-center">
                                        @if ($driver->status == 1)
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktif
                                        @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Tidak Aktif
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-2 text-center border-b border-gray-300">
                                    <div class="inline-flex">
                                        <div class="p-2 bg-green-700 rounded-lg mr-3" title="Cetak QR Code">
                                            <a href={{ route('qrcode', ['id' => $driver->id]) }} target="_blank">
                                                <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M16 17V16H13V13H16V15H18V17H17V19H15V21H13V18H15V17H16ZM21 21H17V19H19V17H21V21ZM3 3H11V11H3V3ZM5 5V9H9V5H5ZM13 3H21V11H13V3ZM15 5V9H19V5H15ZM3 13H11V21H3V13ZM5 15V19H9V15H5ZM18 13H21V15H18V13ZM6 6H8V8H6V6ZM6 16H8V18H6V16ZM16 6H18V8H16V6Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="p-2 bg-blue-700 rounded-lg mr-3" title="Cetak Kartu">
                                            <a href="{{ route('kartuAnggota', ['memberid' => $driver->memberid]) }}"
                                                target="_blank">
                                                <svg class="text-white w-7 h-7" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M13 12H16L12 16L8 12H11V8H13V12ZM15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="py-4 px-4 bg-white">
                    {{ $drivers->links() }}
                </div>
            </div>
        </div>
    </section>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('table-search-users');

        searchInput.addEventListener('input', function() {
            let query = this.value.trim();

            fetch(`/search/drivers?q=${query}`, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Hapus isi tabel saat ini
                    const tbody = document.querySelector('tbody');
                    tbody.innerHTML = '';

                    // Tambahkan baris baru sesuai dengan hasil pencarian
                    data.forEach(driver => {
                        let row = `
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <div class="lg:w-full w-40">
                                    <div class="text-sm font-semibold overflow-x-auto whitespace-nowrap">${driver.fullname}</div>
                                    <div class="text-xs text-gray-500">${driver.memberid}</div>
                                </div>
                            </th>
                            <td class="hidden lg:block lg:px-6 lg:py-4">
                                <div class="flex items-center">
                                    ${driver.status == 1 ? '<div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktif' : '<div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Tidak Aktif'}
                                </div>
                            </td>
                            <td class="px-4 py-2 text-center border-b border-gray-300">
                                <div class="flex inline">
                                    <div class="p-2 bg-green-700 rounded-lg mr-3" title="Cetak QR Code">
                                        <a href="/qrcode/${driver.id}" target="_blank">
                                            <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M16 17V16H13V13H16V15H18V17H17V19H15V21H13V18H15V17H16ZM21 21H17V19H19V17H21V21ZM3 3H11V11H3V3ZM5 5V9H9V5H5ZM13 3H21V11H13V3ZM15 5V9H19V5H15ZM3 13H11V21H3V13ZM5 15V19H9V15H5ZM18 13H21V15H18V13ZM6 6H8V8H6V6ZM6 16H8V18H6V16ZM16 6H18V8H16V6Z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="p-2 bg-blue-700 rounded-lg mr-3" title="Cetak Kartu">
                                        <a href="/kartu-anggota/${driver.memberid}" target="_blank">
                                            <svg class="text-white w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M13 12H16L12 16L8 12H11V8H13V12ZM15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918Z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `;
                        tbody.innerHTML += row;
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>

</html>
