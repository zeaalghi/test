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
    <section class="lg:flex lg:items-center">
        <div class="relative container mx-auto">
            <div class="absolute right-20 lg:-top-24 lg:-left-28">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                    class="w-[600px] filter blur-2xl opacity-20">
                    <path fill="#F35937"
                        d="M51.5,-69.7C65.1,-60.9,73.5,-43.8,76,-26.9C78.4,-10,74.9,6.6,71,24.4C67.1,42.3,62.8,61.3,50.9,72.1C39,82.9,19.5,85.5,1.3,83.8C-17,82,-33.9,76.1,-48.1,66C-62.3,55.9,-73.6,41.8,-78.8,25.6C-84.1,9.5,-83.3,-8.7,-77,-24.1C-70.6,-39.5,-58.9,-52.1,-45.1,-60.9C-31.4,-69.7,-15.7,-74.6,1.6,-76.9C18.9,-79.1,37.8,-78.6,51.5,-69.7Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="absolute top-[640px] -left-[250px] lg:top-24 lg:left-[60%]">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                    class="w-[1px] lg:w-[500px] filter blur-2xl opacity-20">
                    <path fill="#F35937"
                        d="M51.5,-69.7C65.1,-60.9,73.5,-43.8,76,-26.9C78.4,-10,74.9,6.6,71,24.4C67.1,42.3,62.8,61.3,50.9,72.1C39,82.9,19.5,85.5,1.3,83.8C-17,82,-33.9,76.1,-48.1,66C-62.3,55.9,-73.6,41.8,-78.8,25.6C-84.1,9.5,-83.3,-8.7,-77,-24.1C-70.6,-39.5,-58.9,-52.1,-45.1,-60.9C-31.4,-69.7,-15.7,-74.6,1.6,-76.9C18.9,-79.1,37.8,-78.6,51.5,-69.7Z"
                        transform="translate(100 100)" />
                </svg>
            </div>
            <div class="mx-4">
                <div class="mx-auto mt-16 lg:w-[75%]">
                    <h1 class="text-3xl lg:text-5xl lg:text-center font-medium mb-1 lg:mb-5 none">Kami memberikan <span
                            class="bg-[#de3a3a] text-white px-1 rounded-xl">solusi</span> untuk</h1>
                    <h1 class="text-3xl lg:text-5xl lg:text-center font-medium none">mengatasi pengiriman barang
                        Anda.</span>
                    </h1>
                    <p
                        class="text-sm lg:text-lg lg:text-center w-[86%] lg:mx-auto lg:mt-8 mt-4 font-medium text-[#787878] none">
                        Solusi terbaik
                        pengiriman barang anda biar kami yang atasi. Tinggal sat set wat wet barang pun sampai tujuan.
                        Tidak perlu ribet cukup klak klik aja bolo👍</p>
                </div>
                <div class="lg:flex mt-14 lg:mt-8 justify-center lg:gap-10 none">
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
</body>

</html>
