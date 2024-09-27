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



    <style>
        /* Add your custom styles here */
        .activated {
            background-color: #E02424;
            /* Tailwind's violet-700 */
            outline: none;
            /* box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.5); */
            /* Tailwind's violet-300 */
            color: #FFFFFF;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <title>DKWB</title>
</head>

<body style="background-color: rgba(235, 235, 235, 0.3); font-family: 'Plus Jakarta Sans', sans-serif;">
    <nav class="fixed top-0 z-50 w-full dark:bg-gray-800"
        style="background-color: #FFFFFF; font-family: Plus Jakarta Sans;">
        <div class="px-3 py-1 lg:px-5 lg:pl-3 shadow-lg ">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="#" class="flex px-6 ms-2 md:me-24">
                        <img src="{{ asset('assets/img/logo 4.svg') }}" class="h-16" alt="Logo" />
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-100 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                @if (session('role') == 'admin')
                                    <img class="w-8 h-8 rounded-full" src="{{ asset('assets/img/user.svg') }}"
                                        alt="Avatar">
                                @else
                                    <img class="w-8 h-8 rounded-full" src="{{ session('imageProfile') }}"
                                        alt="user photo">
                                @endif
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    @if (session('role') == 'admin')
                                        {{ auth()->user()->name }}
                                    @else
                                        {{ session('fullname') }}
                                    @endif
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    @if (session('role') == 'admin')
                                        {{ auth()->user()->email }}
                                    @else
                                        {{ session('idcard') }}
                                    @endif
                                </p>
                            </div>
                            <ul class="py-2" role="none">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem" type="submit">Sign out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="bg-white fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto dark:bg-gray-800">
            <ul class="space-y-2 mt-4" style="font-family: 'Plus Jakarta Sans', sans-serif">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700 group {{ request()->routeIs('dashboard') ? 'activated' : '' }}"
                        onclick="setActive(this)">
                        <svg class="w-5 h-5 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M19 21H5C4.44772 21 4 20.5523 4 20V11L1 11L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11L20 11V20C20 20.5523 19.5523 21 19 21ZM6 19H18V9.15745L12 3.7029L6 9.15745V19ZM8 15H16V17H8V15Z">
                            </path>
                        </svg>

                        <span class="ms-3 font-medium">Dashboard</span>
                    </a>
                </li>
                @if (session('role') == 'admin')
                    <li>
                        <p
                            class="flex items-center py-4 text-gray-900 font-bold dark:text-white border-t border-gray-300 dark:border-gray-700">
                            <span class="flex-1 ms-3 whitespace-nowrap text-sm text-gray-400 ">DATA MANAGEMENT</span>
                        </p>
                    </li>
                    <li>
                        <a href="{{ route('pageDataDriver') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700 group {{ request()->routeIs('pageDataDriver') ? 'activated' : '' }}"
                            onclick="setActive(this)">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M3 6H21V18H3V6ZM2 4C1.44772 4 1 4.44772 1 5V19C1 19.5523 1.44772 20 2 20H22C22.5523 20 23 19.5523 23 19V5C23 4.44772 22.5523 4 22 4H2ZM13 8H19V10H13V8ZM18 12H13V14H18V12ZM10.5 10C10.5 11.3807 9.38071 12.5 8 12.5C6.61929 12.5 5.5 11.3807 5.5 10C5.5 8.61929 6.61929 7.5 8 7.5C9.38071 7.5 10.5 8.61929 10.5 10ZM8 13.5C6.067 13.5 4.5 15.067 4.5 17H11.5C11.5 15.067 9.933 13.5 8 13.5Z">
                                </path>
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap font-medium">Menu Data Driver</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pageDataOrderReg') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ request()->routeIs('pageDataOrderReg') ? 'activated' : '' }}"
                            onclick="setActive(this)">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M15.3709 3.44L18.5819 9.002L22.0049 9.00218V11.0022L20.8379 11.002L20.0813 20.0852C20.0381 20.6035 19.6048 21.0022 19.0847 21.0022H4.92502C4.40493 21.0022 3.97166 20.6035 3.92847 20.0852L3.17088 11.002L2.00488 11.0022V9.00218L5.42688 9.002L8.63886 3.44L10.3709 4.44L7.73688 9.002H16.2719L13.6389 4.44L15.3709 3.44ZM18.8309 11.002L5.17788 11.0022L5.84488 19.0022H18.1639L18.8309 11.002ZM13.0049 13.0022V17.0022H11.0049V13.0022H13.0049ZM9.00488 13.0022V17.0022H7.00488V13.0022H9.00488ZM17.0049 13.0022V17.0022H15.0049V13.0022H17.0049Z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap font-medium">Menu Order Reguler</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pageDataOrderPr') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ request()->routeIs('pageDataOrderPr') ? 'activated' : '' }}"
                            onclick="setActive(this)">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M12.0049 2C15.3186 2 18.0049 4.68629 18.0049 8V9H22.0049V11H20.8379L20.0813 20.083C20.0381 20.6013 19.6048 21 19.0847 21H4.92502C4.40493 21 3.97166 20.6013 3.92847 20.083L3.17088 11H2.00488V9H6.00488V8C6.00488 4.68629 8.69117 2 12.0049 2ZM18.8309 11H5.17788L5.84488 19H18.1639L18.8309 11ZM13.0049 13V17H11.0049V13H13.0049ZM9.00488 13V17H7.00488V13H9.00488ZM17.0049 13V17H15.0049V13H17.0049ZM12.0049 4C9.86269 4 8.1138 5.68397 8.00978 7.80036L8.00488 8V9H16.0049V8C16.0049 5.8578 14.3209 4.10892 12.2045 4.0049L12.0049 4Z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap font-medium">Menu Order Private</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pageDataTruckReguler') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ request()->routeIs('pageDataTruckReguler') ? 'activated' : '' }}"
                            onclick="setActive(this)">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M8.96456 18C8.72194 19.6961 7.26324 21 5.5 21C3.73676 21 2.27806 19.6961 2.03544 18H1V6C1 5.44772 1.44772 5 2 5H16C16.5523 5 17 5.44772 17 6V8H20L23 12.0557V18H20.9646C20.7219 19.6961 19.2632 21 17.5 21C15.7368 21 14.2781 19.6961 14.0354 18H8.96456ZM15 7H3V15.0505C3.63526 14.4022 4.52066 14 5.5 14C6.8962 14 8.10145 14.8175 8.66318 16H14.3368C14.5045 15.647 14.7296 15.3264 15 15.0505V7ZM17 13H21V12.715L18.9917 10H17V13ZM17.5 19C18.1531 19 18.7087 18.5826 18.9146 18C18.9699 17.8436 19 17.6753 19 17.5C19 16.6716 18.3284 16 17.5 16C16.6716 16 16 16.6716 16 17.5C16 17.6753 16.0301 17.8436 16.0854 18C16.2913 18.5826 16.8469 19 17.5 19ZM7 17.5C7 16.6716 6.32843 16 5.5 16C4.67157 16 4 16.6716 4 17.5C4 17.6753 4.03008 17.8436 4.08535 18C4.29127 18.5826 4.84689 19 5.5 19C6.15311 19 6.70873 18.5826 6.91465 18C6.96992 17.8436 7 17.6753 7 17.5Z">
                                </path>
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap font-medium">Data Armada</span>
                            {{-- <span
                        class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                    --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pageClient') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ request()->routeIs('pageClient') ? 'activated' : '' }}"
                            onclick="setActive(this)">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap font-medium">Data Client</span>
                            {{-- <span
                        class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                    --}}
                        </a>
                    </li>
                    {{-- <li>
                    <a href="{{ route('pageDataOngkir') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ request()->routeIs('pageDataOngkir') ? 'activated' : '' }}"
                        onclick="setActive(this)">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256"
                            xml:space="preserve" fill="currentColor">

                            <defs>
                            </defs>
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; opacity: 1;"
                                transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                <path
                                    d="M 43.301 30.671 c 0.555 -0.208 1.123 -0.321 1.686 -0.35 c 0.005 0 0.01 0.002 0.015 0.002 c 0.006 0 0.011 -0.002 0.017 -0.002 c 2.373 -0.108 4.653 1.304 5.531 3.645 c 0.581 1.552 2.315 2.334 3.862 1.755 c 1.551 -0.582 2.337 -2.312 1.755 -3.863 c -1.404 -3.744 -4.545 -6.338 -8.165 -7.217 V 22.5 c 0 -1.657 -1.343 -3 -3 -3 c -1.657 0 -3 1.343 -3 3 v 2.296 c -0.27 0.079 -0.54 0.157 -0.807 0.257 c -2.909 1.091 -5.219 3.249 -6.504 6.077 c -1.286 2.828 -1.393 5.987 -0.302 8.896 c 1.281 3.415 4.016 5.973 7.512 7.033 l 4.224 1.547 l 0.188 0.062 c 1.718 0.504 3.061 1.748 3.685 3.412 c 1.09 2.907 -0.389 6.158 -3.294 7.248 c -0.55 0.207 -1.113 0.321 -1.671 0.352 c -0.01 0 -0.02 -0.003 -0.03 -0.003 c -0.012 0 -0.023 0.003 -0.035 0.004 c -2.367 0.101 -4.636 -1.312 -5.512 -3.646 c -0.582 -1.552 -2.313 -2.341 -3.862 -1.755 c -1.552 0.581 -2.337 2.311 -1.756 3.862 c 1.404 3.743 4.544 6.335 8.165 7.214 V 67.5 c 0 1.657 1.343 3 3 3 c 1.657 0 3 -1.343 3 -3 v -2.292 c 0.27 -0.08 0.54 -0.162 0.808 -0.262 c 6.003 -2.251 9.057 -8.968 6.806 -14.973 c -1.281 -3.415 -4.016 -5.973 -7.512 -7.033 l -4.225 -1.547 l -0.187 -0.062 c -1.718 -0.504 -3.061 -1.748 -3.685 -3.413 c -0.528 -1.408 -0.476 -2.938 0.146 -4.307 C 40.774 32.244 41.893 31.199 43.301 30.671 z"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10;  opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path
                                    d="M 45 0 C 20.187 0 0 20.187 0 45 c 0 24.813 20.187 45 45 45 c 24.813 0 45 -20.187 45 -45 C 90 20.187 69.813 0 45 0 z M 45 84 C 23.495 84 6 66.505 6 45 S 23.495 6 45 6 s 39 17.495 39 39 S 66.505 84 45 84 z"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10;  opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap font-medium">Data Ongkir</span>
                    </a>
                </li> --}}
                    <li>
                        <p href="#"
                            class="flex items-center py-4 text-gray-900 font-bold dark:text-white border-t border-gray-300 dark:border-gray-700">

                            <span class="flex-1 ms-3 whitespace-nowrap text-sm text-gray-400 ">VERIFIKASI AKUN</span>

                        </p>
                    </li>
                    <li>
                        <a href="{{ route('pageValidasiAkun') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ request()->routeIs('pageValidasiAkun') ? 'activated' : '' }}"
                            onclick="setActive(this)">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256"
                                xml:space="preserve" fill="currentColor">
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10;  opacity: 1;"
                                    transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                    <path
                                        d="M 86.114 90 h -6.067 c 0 -19.325 -15.722 -35.047 -35.047 -35.047 C 25.675 54.953 9.954 70.675 9.954 90 H 3.886 C 3.886 67.329 22.33 48.886 45 48.886 C 67.671 48.886 86.114 67.329 86.114 90 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path
                                        d="M 45 46.488 c -12.817 0 -23.244 -10.427 -23.244 -23.244 S 32.183 0 45 0 c 12.816 0 23.244 10.427 23.244 23.244 S 57.816 46.488 45 46.488 z M 45 6.067 c -9.471 0 -17.176 7.705 -17.176 17.176 c 0 9.471 7.705 17.177 17.176 17.177 c 9.471 0 17.176 -7.705 17.176 -17.177 C 62.176 13.773 54.471 6.067 45 6.067 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap font-medium">Validasi Ubah Akun</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pageValidasiDriver') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ request()->routeIs('pageValidasiDriver') ? 'activated' : '' }}"
                            onclick="setActive(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap font-medium">Pendaftaran Driver</span>
                        </a>
                    </li>
                    <li>
                        <p href="#"
                            class="flex items-center py-4 text-gray-900 font-bold dark:text-white border-t border-gray-300 dark:border-gray-700">

                            <span class="flex-1 ms-3 whitespace-nowrap text-sm text-gray-400 ">PENGATURAN</span>

                        </p>
                    </li>

                    <li>
                        <a href="{{ route('konfigurasi') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ request()->routeIs('konfigurasi') ? 'activated' : '' }}"
                            onclick="setActive(this)">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256"
                                xml:space="preserve" fill="currentColor">

                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; opacity: 1;"
                                    transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                    <path
                                        d="M 34.268 90 c -0.669 0 -1.338 -0.132 -1.975 -0.395 l -9.845 -4.079 c -1.274 -0.527 -2.267 -1.519 -2.795 -2.795 c -0.528 -1.274 -0.528 -2.679 0 -3.953 c 1.216 -2.936 0.075 -5.558 -1.399 -7.032 c -1.474 -1.475 -4.094 -2.615 -7.033 -1.399 c -1.273 0.529 -2.677 0.528 -3.952 0.001 c -1.275 -0.528 -2.268 -1.52 -2.795 -2.795 l -4.078 -9.844 c -1.089 -2.63 0.164 -5.657 2.794 -6.748 C 6.128 49.745 7.174 47.085 7.174 45 c 0 -2.084 -1.046 -4.745 -3.983 -5.962 c -1.274 -0.528 -2.267 -1.52 -2.795 -2.795 c -0.528 -1.274 -0.528 -2.678 0 -3.952 l 4.078 -9.844 c 1.09 -2.631 4.12 -3.883 6.747 -2.795 c 2.936 1.216 5.558 0.075 7.033 -1.399 c 1.474 -1.474 2.616 -4.095 1.399 -7.032 c -1.09 -2.631 0.164 -5.657 2.795 -6.747 l 9.844 -4.077 c 1.274 -0.528 2.678 -0.528 3.953 0 c 1.275 0.528 2.268 1.521 2.795 2.796 c 1.216 2.936 3.877 3.982 5.962 3.982 c 2.085 0 4.745 -1.046 5.962 -3.983 c 1.09 -2.631 4.115 -3.885 6.748 -2.795 l 9.845 4.077 c 1.274 0.528 2.267 1.52 2.795 2.795 c 0.527 1.274 0.527 2.679 -0.001 3.953 c -1.217 2.936 -0.074 5.557 1.399 7.031 c 1.475 1.474 4.097 2.615 7.032 1.399 c 1.277 -0.528 2.68 -0.527 3.953 0 c 1.275 0.528 2.268 1.521 2.796 2.796 l 4.077 9.843 c 1.089 2.631 -0.165 5.658 -2.795 6.747 c -2.937 1.217 -3.983 3.878 -3.983 5.962 c 0 2.085 1.046 4.745 3.983 5.962 h 0.001 c 2.629 1.091 3.883 4.117 2.795 6.747 l -4.079 9.845 c -0.527 1.273 -1.52 2.266 -2.795 2.795 c -1.273 0.528 -2.679 0.528 -3.954 -0.001 c -2.934 -1.217 -5.557 -0.074 -7.031 1.399 c -1.474 1.475 -2.615 4.096 -1.399 7.032 c 0.528 1.274 0.528 2.678 0.001 3.953 c -0.528 1.275 -1.521 2.267 -2.796 2.796 l -9.844 4.077 c -2.63 1.09 -5.657 -0.166 -6.748 -2.794 c -1.217 -2.938 -3.877 -3.985 -5.962 -3.985 c -2.084 0 -4.746 1.047 -5.962 3.984 c -0.527 1.273 -1.52 2.266 -2.794 2.795 C 35.607 89.868 34.937 90 34.268 90 z M 25.491 80.293 l 8.349 3.459 c 2.105 -4.294 6.31 -6.926 11.161 -6.926 c 0 0 0 0 0 0 c 4.852 0 9.056 2.633 11.16 6.926 l 8.348 -3.459 c -1.547 -4.524 -0.435 -9.358 2.996 -12.788 c 3.431 -3.431 8.265 -4.544 12.789 -2.996 l 3.459 -8.348 c -4.294 -2.104 -6.926 -6.309 -6.926 -11.16 c 0 -4.852 2.632 -9.057 6.926 -11.162 l -3.459 -8.349 c -4.523 1.549 -9.359 0.435 -12.789 -2.994 c -3.432 -3.431 -4.543 -8.265 -2.996 -12.789 l -8.348 -3.458 c -2.103 4.293 -6.308 6.925 -11.16 6.925 c -4.852 0 -9.057 -2.632 -11.162 -6.925 l -8.349 3.458 c 1.548 4.524 0.436 9.358 -2.995 12.789 c -3.431 3.431 -8.264 4.544 -12.789 2.994 l -3.458 8.349 c 4.294 2.105 6.926 6.31 6.926 11.162 c 0 4.852 -2.632 9.056 -6.926 11.16 l 3.458 8.348 c 4.525 -1.547 9.359 -0.435 12.789 2.995 C 25.927 70.935 27.039 75.769 25.491 80.293 z M 84.511 56.503 c 0.001 0 0.002 0 0.003 0.001 C 84.513 56.503 84.512 56.503 84.511 56.503 z M 45.001 65.781 C 33.543 65.781 24.22 56.459 24.22 45 c 0 -11.459 9.323 -20.781 20.781 -20.781 S 65.783 33.541 65.783 45 C 65.783 56.459 56.46 65.781 45.001 65.781 z M 45.001 30.218 C 36.851 30.218 30.22 36.85 30.22 45 c 0 8.151 6.631 14.782 14.781 14.782 c 8.151 0 14.782 -6.631 14.782 -14.782 C 59.783 36.85 53.153 30.218 45.001 30.218 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10;  opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap font-medium">Konfigurasi</span>
                        </a>
                    </li>
                @else
                    <li>
                        <p
                            class="flex items-center py-4 text-gray-900 font-bold dark:text-white border-t border-gray-300 dark:border-gray-700">
                            <span class="flex-1 ms-3 whitespace-nowrap text-sm text-gray-400 uppercase">data
                                driver</span>
                        </p>
                    </li>
                    <li>
                        <a href="{{ route('profileDriver') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ request()->routeIs('profileDriver') ? 'activated' : '' }}"
                            onclick="setActive(this)">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M3 6H21V18H3V6ZM2 4C1.44772 4 1 4.44772 1 5V19C1 19.5523 1.44772 20 2 20H22C22.5523 20 23 19.5523 23 19V5C23 4.44772 22.5523 4 22 4H2ZM13 8H19V10H13V8ZM18 12H13V14H18V12ZM10.5 10C10.5 11.3807 9.38071 12.5 8 12.5C6.61929 12.5 5.5 11.3807 5.5 10C5.5 8.61929 6.61929 7.5 8 7.5C9.38071 7.5 10.5 8.61929 10.5 10ZM8 13.5C6.067 13.5 4.5 15.067 4.5 17H11.5C11.5 15.067 9.933 13.5 8 13.5Z">
                                </path>
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap font-medium">Profil Driver</span>
                        </a>
                    </li>


                    <li>
                        <p href="#"
                            class="flex items-center py-4 text-gray-900 font-bold dark:text-white border-t border-gray-300 dark:border-gray-700">

                            <span class="flex-1 ms-3 whitespace-nowrap text-sm text-gray-400 uppercase">pesanan</span>

                        </p>
                    </li>
                    <li>
                        <a href="{{ route('dataOrderDriver') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ request()->routeIs('dataOrderDriver') ? 'activated' : '' }}"
                            onclick="setActive(this)">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M8.96456 18C8.72194 19.6961 7.26324 21 5.5 21C3.73676 21 2.27806 19.6961 2.03544 18H1V6C1 5.44772 1.44772 5 2 5H16C16.5523 5 17 5.44772 17 6V8H20L23 12.0557V18H20.9646C20.7219 19.6961 19.2632 21 17.5 21C15.7368 21 14.2781 19.6961 14.0354 18H8.96456ZM15 7H3V15.0505C3.63526 14.4022 4.52066 14 5.5 14C6.8962 14 8.10145 14.8175 8.66318 16H14.3368C14.5045 15.647 14.7296 15.3264 15 15.0505V7ZM17 13H21V12.715L18.9917 10H17V13ZM17.5 19C18.1531 19 18.7087 18.5826 18.9146 18C18.9699 17.8436 19 17.6753 19 17.5C19 16.6716 18.3284 16 17.5 16C16.6716 16 16 16.6716 16 17.5C16 17.6753 16.0301 17.8436 16.0854 18C16.2913 18.5826 16.8469 19 17.5 19ZM7 17.5C7 16.6716 6.32843 16 5.5 16C4.67157 16 4 16.6716 4 17.5C4 17.6753 4.03008 17.8436 4.08535 18C4.29127 18.5826 4.84689 19 5.5 19C6.15311 19 6.70873 18.5826 6.91465 18C6.96992 17.8436 7 17.6753 7 17.5Z">
                                </path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap font-medium">Order</span>
                        </a>
                    </li>
                @endif
                <br>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-6">
            @yield('content')
        </div>
    </div>
</body>
<script>
    function setActive(element) {
        // Remove 'active' class from all items
        document.querySelectorAll('a').forEach(item => {
            item.classList.remove('active');
            item.classList.remove('focus:outline-none');
            item.classList.remove('focus:ring');
            item.classList.remove('focus:ring-red-300');
            item.classList.remove('active:bg-red-700');
        });

        // Add 'active' class to the clicked item
        element.classList.add('active');
        element.classList.add('focus:outline-none');
        element.classList.add('focus:ring');
        element.classList.add('focus:ring-red-300');
        element.classList.add('active:bg-red-700');
    }
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"
    integrity="sha256-73rO2g7JSErG8isZXCse39Kf5yGuePgjyvot/8cRCNQ=" crossorigin="anonymous"></script>

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
