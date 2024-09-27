<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"
        integrity="sha256-73rO2g7JSErG8isZXCse39Kf5yGuePgjyvot/8cRCNQ=" crossorigin="anonymous"></script>

    <style>
        .activated {
            border-bottom: 2px solid red;
            color: #E02424;
        }
    </style>

    <link href="{{ asset('assets/img/logo 4.svg') }}" rel="icon">

    <title>DKWB</title>
</head>


<header class="bg-white absolute top-0 w-full flex items-center z-10 shadow">
    <div class="container mx-auto lg:mx-auto lg:px-10">
        <div class="flex items-center justify-between relative">
            <div class="px-2">
                <a href="{{ route('index') }}" class="py-3 block">
                    <img src="{{ asset('assets/img/dkwbcar.svg') }}" alt="" srcset="" width="160">
                </a>
            </div>
            <div class="flex items-center px-2 lg:w-5/6">
                <button id="hamburger" name="hamburger" type="button"
                    class="block absolute right-4 lg:hidden md:right-0">
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                </button>

                <nav id="nav-menu"
                    class="hidden absolute py-5 bg-white shadow-lg rounded-xl max-w-[250px] w-full right-4 top-full lg:block lg:static lg:max-w-full lg:bg-transparent lg:shadow-none">
                    <ul class="block lg:flex lg:items-center lg:justify-between">
                        <div class="lg:flex">
                            <li class="group">
                                <a href="{{ route('pageAboutUs') }}"
                                    class="flex text-base hover:text-red-700 font-semibold py-2 mx-8 text-black {{ request()->routeIs('pageAboutUs') ? 'activated' : '' }}"
                                    onclick="setActive(this)">
                                    <span>
                                        Tentang Kami
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{ route('pagePendaftaran') }}"
                                    class="flex text-base hover:text-red-700 font-semibold py-2 mx-8 text-black {{ request()->routeIs('pagePendaftaran') ? 'activated' : '' }}"
                                    onclick="setActive(this)">
                                    <span>
                                        Pendaftaran Member
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="{{ route('pageCekOngkir') }}"
                                    class="flex text-base hover:text-red-700 font-semibold py-2 mx-8 text-black {{ request()->routeIs('pageCekOngkir') ? 'activated' : '' }}"
                                    onclick="setActive(this)">
                                    <span>Cek Ongkir</span>
                                </a>
                            </li>
                        </div>
                        <div class="lg:flex lg:mr-5">
                            @if (auth()->user() == null)
                                <li class="flex py-2">
                                    <button data-modal-target="authentication-modal"
                                        data-modal-toggle="authentication-modal"
                                        class="mx-auto px-2 py-2 w-3/4 bg-red-700 text-base font-semibold text-white rounded-lg hover:shadow-md lg:w-full lg:px-14 lg:rounded-lg">
                                        Masuk
                                    </button>
                                </li>
                            @else
                                <li class="flex py-2">
                                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                        class="flex justify-between mx-auto px-2 py-2 w-auto bg-red-700 text-base font-semibold text-white rounded-lg hover:shadow-md lg:w-full lg:px-14 lg:rounded-lg"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#e8eaed">
                                            <path
                                                d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                        </svg>
                                        <span class="mx-2">{{ auth()->user()->name }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#e8eaed">
                                            <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                                        </svg>
                                    </button>
                                </li>
                                <!-- Dropdown menu -->
                                <div id="dropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            <a href="{{ route('user.profile', ['user' => auth()->user()->id]) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Profil
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.myOrder') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Order Saya
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Keluar
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Login modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="relative items-center justify-between p-4 md:p-5 border-b border-slate-400 rounded-t">
                <h3 class="uppercase text-xl font-semibold text-red-700 text-center w-full">
                    Login
                </h3>
                <button type="button"
                    class="absolute text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center right-3 lg:top-[19px] top-4"
                    data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 mx-8 md:p-5">
                <form class="" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="email" id="email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " required />
                        <label for="email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Masukkan Email Anda
                        </label>
                    </div>
                    <div class="relative z-0 w-full mb-10 group">
                        <input type="password" name="password" id="password"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " required />
                        <label for="password"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Masukkan Password Anda
                        </label>
                        {{-- <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            Lupa Password?
                        </p> --}}
                    </div>
                    <button type="submit"
                        class="w-full mb-4 uppercase text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Login
                    </button>
                    <div class="text-sm text-center font-medium text-gray-500 dark:text-gray-300">
                        Belum punya akun?
                        <a href="#" class="text-red-700 hover:underline dark:text-red-500"
                            data-modal-target="registration-modal" data-modal-toggle="registration-modal"
                            data-modal-hide="authentication-modal">
                            Daftar disini
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Registration Modal -->
<div id="registration-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="relative items-center justify-between p-4 md:p-5 border-b border-slate-400 rounded-t">
                <button type="button"
                    class="absolute text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center right-3 lg:top-[19px] top-4"
                    data-modal-hide="registration-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <h3 class="text-xl uppercase font-semibold text-red-700 text-center w-full">
                    Register
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 items-center">
                <form class="max-w-md mx-auto" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name" id="nama"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " required />
                        <label for="nama"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Nama Lengkap
                        </label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="email" id="floating_email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " required />
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Email
                        </label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="phone" id="phone"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " required />
                        <label for="phone"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Nomor Telepon
                        </label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="password" id="floating_password"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " required />
                        <label for="floating_password"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Password
                        </label>
                    </div>
                    <div class="flex justify-center roundel-lg">
                        <button type="submit"
                            class="text-white uppercase bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="mt-6" style="font-family: 'Plus Jakarta Sans', sans-serif;">
    @yield('content')
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

<script>
    function setActive(element) {
        document.querySelectorAll('a').forEach(item => {
            item.classList.remove('active');
            item.classList.remove('border-b-2');
            item.classList.remove('border-red-500');
        });

        element.classList.add('active');
        element.classList.add('border-b-2');
        element.classList.add('border-red-500');
    }
</script>

@stack('script')
@if (session('success'))
    <script>
        Swal.fire({
            title: "Success",
            text: "{{ session('success') }}",
            icon: "success",
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            title: "Error",
            text: "{{ session('error') }}",
            icon: "error",
        });
    </script>
@endif

</html>
