@extends('master')
@section('content')
    <div class="">
        <div class="container lg:mx-auto p-4">
            <!-- Back Icon and Heading -->
            <div class="mt-6 flex items-center">
                <!-- Back Icon -->
                <button onclick="window.history.back();" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>
                <!-- Heading -->
                <p class="mr-4 text-2xl font-extrabold text-center w-full">Data Detail Pendaftar</p>
            </div>
            <div
                class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-span-1 sm:col-span-2 flex flex-col items-center mt-4">
                        <img id="avatar-preview" class="w-48 h-48 rounded-full mb-4"
                            src="{{ asset('storage/profile/' . $driver->images->first()->filepath) }}" alt="Default avatar">
                        {{-- <input id="upload-avatar" type="file" name="profile" class="hidden" accept="image/*" readonly>
                        <button type="button" onclick="document.getElementById('upload-avatar').click();"
                            class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Pilih Gambar
                        </button> --}}
                        {{-- <p id="error-message" class="mt-2 text-sm text-red-600"></p> --}}
                    </div>
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-8 grid gap-4 sm:gap-6 grid-cols-1 sm:grid-cols-2">
                        <div class="mb-5">
                            <label for="nama_lengkap"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Lengkap</label>
                            <input type="text" name="fullname" id="nama_lengkap" value="{{ $driver->fullname }}"
                                class="bg-white-50 border uppercase border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                readonly>
                        </div>
                        <div class="mb-5">
                            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                                (Nomor
                                Induk Kependudukan)</label>
                            <input type="text" name="nik" id="nik" value="{{ $driver->idcard }}"
                                class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                readonly>
                        </div>
                        <div class="mb-5">
                            <label for="tempat_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                                Lahir</label>
                            <input type="text" name="birthloc" id="tempat_lahir" value="{{ $driver->birthloc }}"
                                class="bg-white-50 uppercase border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                readonly>
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Lahir</label>
                            <!-- SVG Icon Placement -->
                            <input type="date" name="birthdate" id="tanggal_lahir" value="{{ $driver->birthdate }}"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                readonly>
                        </div>
                        <div class="mb-5">
                            <label for="jk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <input type="text" name="jk" id="jk"
                                value="@if ($driver->gender == 'L') Laki-laki @elseif ($driver->gender == 'P') Perempuan @endif"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                readonly>
                        </div>
                        <div class="mb-5">
                            <label for="no_telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                Telepon</label>
                            <input type="text" name="phone" id="no_telepon" value="{{ $driver->phone }}"
                                class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                readonly>
                        </div>
                        <div class="mb-5">
                            <label for="sim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                SIM</label>
                            <input type="text" name="sim" id="sim" value="{{ $driver->lisence }}"
                                class="bg-white-50 border uppercase border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                readonly>
                        </div>
                        <div class="mb-5">
                            <label for="asuransi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Asuransi</label>
                            <input type="text" name="asuransi" id="asuransi" value="{{ $driver->insurance }}"
                                class="bg-white-50 uppercase border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                readonly>
                        </div>
                    </div>
                    <div class="px-4 mx-auto max-w-2xl mb-8">
                        <label for="alamat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea id="alamat" name="address" rows="3"
                            class="block p-2.5 uppercase w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            readonly>{{ $driver->address }}</textarea>
                    </div>
                    <!-- Gambar Truck-->
                    <div class="px-4 mx-auto max-w-2xl mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Unit</label>
                        <div class="flex items-center justify-center w-full">
                            <label
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <img class="w-full h-60 rounded-xl"
                                        src="{{ asset('storage/truck/' . $truckImage->filepath) }}" alt="">
                                </div>
                            </label>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="flex mx-auto gap-4 max-w-2xl lg:justify-end justify-between">
                        <div class="flex justify-end px-4">
                            <a href="{{ route('rejectedDriverValidation', ['driver' => $driver->id]) }}"
                                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Tolak
                            </a>
                        </div>
                        <div class="flex justify-end px-4">
                            <a href="{{ route('approvedDriverValidation', ['driver' => $driver->id]) }}"
                                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Terima
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
