@extends('master')
@section('content')
    <div class="">
        <div class="container mx-auto p-4">
            <!-- Back Icon and Heading -->
            <div class="mt-6 flex items-center">
                <!-- Back Icon -->
                <a href="{{ route('pageDataDriver') }}" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <!-- Heading -->
                <p class="mr-4 text-2xl font-extrabold text-center w-full">Edit Driver</p>
            </div>
            <form action="{{ route('aksi.editDriver.admin', ['driver' => $driver->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div
                    class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <!-- Avatar -->
                    <div class="col-span-1 sm:col-span-2 flex flex-col items-center mt-4">
                        <img id="avatar-preview" class="object-cover w-48 h-48 rounded-full mb-4"
                            src="{{ asset('storage/profile/' . $driver->images->first()->filepath) }}" alt="Default avatar">
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
                                class="bg-white-50 uppercase border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $driver->fullname }}">
                        </div>
                        <div class="mb-5">
                            <label for="tempat_lahir"
                                class="block mb-2 text-sm uppercase font-medium text-gray-900 dark:text-white">Tempat
                                Lahir</label>
                            <input type="text" name="birthloc" id="tempat_lahir"
                                class="bg-white-50 border uppercase border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
                                class="block p-2.5 uppercase w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $driver->address }}</textarea>
                        </div>
                        <div class="mb-5">
                            <label for="sim"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                SIM</label>
                            <input type="text" name="lisence" id="sim"
                                class="bg-white-50 border uppercase border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $driver->lisence }}">
                        </div>
                        <div class="mb-5">
                            <label for="asuransi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Asuransi</label>
                            <input type="text" name="insurance" id="asuransi"
                                class="bg-white-50 border uppercase border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $driver->insurance }}">
                        </div>
                        <div class="mb-5">
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select id="status" name="status"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if ($driver->status == 0)
                                    <option selected value="0">Non-Aktif</option>
                                    <option value="1">Aktif</option>
                                @else
                                    <option selected value="1">Aktif</option>
                                    <option value="0">Non-Aktif</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <!-- submit button -->
                    <div class="flex justify-end mr-12">
                        <button type="submit"
                            class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
            <div
                class="mt-8 block lg:flex items-start p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <!-- Upload -->
                <div class="rounded-xl lg:w-5/12 mb-5">
                    <form action="{{ route('tambahTruck', ['driver' => $driver->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-center justify-center w-full">
                            <input id="upload-truk" type="file" name="truk" class="hidden" accept="image/*"
                                required>
                            <label
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div onclick="document.getElementById('upload-truk').click()"
                                    class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <img id="truk-preview" class="w-52 h-52 rounded-xl"
                                        src="{{ asset('assets/img/cloud.svg') }}" alt="">
                                </div>
                            </label>
                        </div>
                        <p id="error-message" class="my-2 text-sm text-red-600"></p>
                        <button type="submit" id="submit-truk"
                            class="hidden py-2 px-4 mt-5 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Upload Gambar
                        </button>
                    </form>
                </div>
                <!-- Foto Truk-->
                <div class="text-center">
                    <div class="flex px-4 lg:mx-4 items-center rounded-lg bg-red-600">
                        <img src="{{ asset('assets/img/info.svg') }}" alt="">
                        <p class="text-md mx-4 py-2 px-4 text-white font-semibold text-left">
                            Untuk Menghapus gambar, klik pada gambar
                        </p>
                    </div>
                    <div class="py-6 px-4 mx-auto max-w-2xl grid gap-4 sm:gap-6 grid-cols-1 sm:grid-cols-2">
                        @foreach ($truckImage as $truck)
                            <form id="delete-form-{{ $truck->id }}" action="{{ route('deleteTruck', $truck->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <img class="h-auto max-w-full rounded-xl cursor-pointer delete-image"
                                    src="{{ asset('storage/truck/' . $truck->filepath) }}" alt="image description"
                                    data-form-id="delete-form-{{ $truck->id }}">
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/phoneFormatter.js') }}"></script>
    <script src="{{ asset('assets/js/imageValidator.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.delete-image');
            images.forEach(image => {
                image.addEventListener('click', function() {
                    const formId = this.getAttribute('data-form-id');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Gambar ini akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(formId).submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
