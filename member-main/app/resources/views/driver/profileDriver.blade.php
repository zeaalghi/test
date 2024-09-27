@extends('master')
@section('content')
    <div class="">
        <div class="container mx-auto p-4">
            <div class="mt-6 flex items-center">
                <p class="mr-4 text-2xl font-extrabold text-center w-full">Profile Driver</p>
            </div>
            <div
                class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <form action="{{ route('aksi.editDriver', ['driver' => $driver->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-span-1 sm:col-span-2 flex flex-col items-center mt-4">

                        <img id="avatar-preview" class="w-48 h-48 rounded-full mb-4"
                            src="{{ asset('storage/profile/' . $driver->images->first()->filepath) }}" alt="Default avatar"
                            onerror="this.onerror=null;this.src='https://upload.wikimedia.org/wikipedia/commons/2/2c/Default_pfp.svg';">
                        <input id="upload-avatar" name="profile" type="file" class="hidden" accept="image/*">
                        <button type="button" onclick="document.getElementById('upload-avatar').click();"
                            class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Pilih Gambar
                        </button>
                        <p id="error-message" class="mt-2 text-sm text-red-600"></p>
                    </div>

                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16 grid gap-4 sm:gap-6 grid-cols-1 sm:grid-cols-2">
                        <div class="mb-5">
                            <label for="no_anggota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                Anggota</label>
                            <input type="text" id="no_anggota"
                                class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $driver->memberid }}" readonly>
                        </div>
                        <div class="mb-5">
                            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                                (Nomor
                                Induk Kependudukan)</label>
                            <input type="text" name="idcard" id="nik"
                                class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $driver->idcard }}">
                        </div>
                        <div class="mb-5">
                            <label for="nama_lengkap"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Lengkap</label>
                            <input type="text" name="fullname" id="nama_lengkap"
                                class="uppercase bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $driver->fullname }}">
                        </div>
                        <div class="mb-5">
                            <label for="tempat_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                                Lahir</label>
                            <input type="text" name="birthloc" id="tempat_lahir"
                                class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $driver->birthloc }}">
                        </div>


                        <div class="mb-5">
                            <label for="tanggal_lahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Lahir</label>
                            <!-- SVG Icon Placement -->

                            <input type="date" name="birthdate" id="tanggal_lahir"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $driver->birthdate }}">
                        </div>


                        <div class="mb-5">
                            <label for="jk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select id="jk" name="gender"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($driver->gender == 'L')
                                    <option selected value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                @else
                                    <option selected value="P">Perempuan</option>
                                    <option value="L">Laki-laki</option>
                                @endif
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="no_telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                Telepon</label>
                            <input type="text" name="phone" id="no_telepon"
                                class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $driver->phone }}">

                        </div>

                        <div class="mb-5">
                            <label for="alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <textarea id="alamat" name="address" rows="3"
                                class="uppercase block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $driver->address }}</textarea>
                        </div>

                        <div class="mb-5">
                            <label for="sim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                SIM</label>
                            <input type="text" name="lisence" id="sim"
                                class="uppercase bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $driver->lisence }}">
                        </div>

                        <div class="mb-5">
                            <label for="asuransi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Asuransi</label>
                            <input type="text" name="insurance" id="asuransi"
                                class="uppercase  bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $driver->insurance }}">
                        </div>
                    </div>

                    <!-- submit button -->
                    <div class="flex justify-end mr-12">
                        <button type="submit" id="submit-button"
                            class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Simpan
                        </button>
                </form>

            </div>
        </div>

        <!-- <script src="{{ asset('assets/js/phoneFormatter.js') }}"></script> -->
        <script src="{{ asset('assets/js/imageValidator.js') }}"></script>
        <script src="{{ asset('assets/js/nikValidator.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    @endsection
