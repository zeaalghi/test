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

    <title>DKWB</title>
</head>
<style>
    .portrait-carousel {
        width: 100%;
        height: 100%;
        /* max-width: 400px; */
        margin: auto;
    }
</style>

<body style="font-family: Plus Jakarta Sans">
    <div class="container-fluid h-screen">
        <div class="grid md:grid-cols-2 gap-8">
            <div class="container mx-auto h-screen flex justify-center items-center ">
                <div id="default-carousel" class="relative portrait-carousel" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-full overflow-hidden rounded-lg">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/carousel/foto11.png') }}"
                                class="absolute block object-cover w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/carousel/truk1.jpg') }}"
                                class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/carousel/truk2.jpg') }}"
                                class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/carousel/truk3.jpg') }}"
                                class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('assets/carousel/truk4.jpg') }}"
                                class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                            data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                            data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                            data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>

            <div class="container mx-auto h-screen flex justify-center items-center mt-5">
                <form action="{{ route('aksi.loginAdmin') }}" method="POST" class="bg-white w-full max-w-md p-6">
                    @csrf
                    <a href="/">
                        <div class="mb-5 flex justify-center items-center" style="height: 100px">
                            <img src="{{ asset('assets/img/logo 4.svg') }}" alt="" class="h-full">
                        </div>
                    </a>
                    <div class="mb-5 text-center">
                        <h5 class="text-3xl font-bold">Login Admin DKWB
                        </h5>
                        <h5 class="font-extralight">Masukkan identitas dan kata sandi</h5>
                    </div>
                    <div class="mb-5">
                        <label for="email"
                            class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-black text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan email" style="height: 50px;" required />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Your
                            Password</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-black text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan password" style="height: 50px;" required />
                    </div>
                    <button type="submit"
                        class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-xl text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign
                        In</button>

                    <!-- create '----or-----' -->
                    <div class="flex items-center justify-between mt-8">

                        <span class="w-[52px] border-b dark:border-gray-600 lg:w-[52px]"></span>

                        <a href="{{ route('loginDriver') }}"
                            class="text-lg text-center text-gray-500 dark:text-gray-400 font-bold hover:underline">
                            >>> Login sebagai Driver <<< </a>

                                <span class="w-[52px] border-b dark:border-gray-400 lg:w-[52px]"></span>
                    </div>


                </form>

            </div>

            <!-- <div class="container mx-auto h-screen flex justify-center items-center mt-5">
                <form action="{{ route('dashboard') }}" method="GET" class="bg-white w-full max-w-md p-6">
                    @csrf
                    <div class="mb-5 flex justify-center items-center" style="height: 100px">
                        <img src="{{ asset('assets/img/logo 4.svg') }}" alt="" class="h-full">
                    </div>
                    <div class="mb-5 text-center">
                        <h5 class="text-3xl font-bold" style="font-family: 'Inter', sans-serif">Sign In to your account
                        </h5>
                        <h5 class="font-extralight" style="font-family: 'Inter', sans-serif">Enter your details to
                            proceed further</h5>
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                            style="font-family: 'Inter', sans-serif">Email</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-black text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" style="height: 50px;" />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                            style="font-family: 'Inter', sans-serif">Your Password</label>
                        <input type="password" id="password"
                            class="bg-gray-50 border border-black text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            style="height: 50px;" />
                    </div>
                    <button type="submit"
                        class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-xl text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        style="font-family: 'Inter', sans-serif; height: 50px;">Sign In</button>
                </form>
            </div> -->
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"
        integrity="sha256-73rO2g7JSErG8isZXCse39Kf5yGuePgjyvot/8cRCNQ=" crossorigin="anonymous"></script>

    @stack('script')
    @if (session('error'))
        <script>
            Swal.fire({
                title: "Error",
                text: "{{ session('error') }}",
                icon: "error",
            });
        </script>
    @endif
</body>

</html>
