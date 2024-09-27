@extends('master')

@section('content')
<div class="">

    {{-- Title --}}
    <div class="mt-10">
        <p class="text-2xl font-extrabold">DATA ONGKIR</p>
    </div>

    {{-- Content --}}
    <div
        class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="flex justify-end w-full py-4">
            {{-- Button Search --}}
            <button type="button"
                class="w- inline-flex items-center text-center bg-red-700 text-white hover:bg-red-800 focus:ring-4 focus:ring-red-600 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11 19.5C15.4183 19.5 19 15.9183 19 11.5C19 7.08172 15.4183 3.5 11 3.5C6.58172 3.5 3 7.08172 3 11.5C3 15.9183 6.58172 19.5 11 19.5Z"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M20.9999 21.5L16.6499 17.15" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <span class="font-bold">SEARCH</span>
            </button>
        </div>

        {{-- Table --}}
        <div class="w-full overflow-hidden">
            <div class="overflow-hidden min-w-max">
                <div
                    class="grid grid-cols-5 p-4 text-center text-sm font-medium bg-red-700 text-white gap-x-16 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                    <div>NAMA</div>
                    <div>EMAIL</div>
                    <div>ROLE</div>
                    <div>STATUS</div>
                    <div>AKSI</div>
                </div>
                <div
                    class="grid grid-cols-5 px-4 py-5 text-center text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
                    <div>Koko Anton</div>
                    <div>koko@anton.com</div>
                    <div>Petarung</div>
                    <div>Sehat</div>
                    <a href="" class="flex justify-center hover:cursor-pointer">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div
                    class="grid grid-cols-5 px-4 py-5 text-center text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
                    <div>Koko Anton</div>
                    <div>koko@anton.com</div>
                    <div>Petarung</div>
                    <div>Sehat</div>
                    <a href="" class="flex justify-center hover:cursor-pointer">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div
                    class="grid grid-cols-5 px-4 py-5 text-center text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
                    <div>Koko Anton</div>
                    <div>koko@anton.com</div>
                    <div>Petarung</div>
                    <div>Sehat</div>
                    <a href="" class="flex justify-center cursor-pointer">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center pt-5">
        <nav aria-label="Page navigation example" class="">
            <ul class="inline-flex -space-x-px text-base h-10">
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                </li>
                <li>
                    <a href="#" aria-current="page"
                        class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                </li>
            </ul>
        </nav>
    </div>      
</div>
@endsection