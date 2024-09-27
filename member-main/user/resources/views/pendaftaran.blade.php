@extends('master')
@section('content')
    <section>
        <div class="container mx-auto py-24">
            <h1 class="px-10 text-xl font-bold text-slate-900">Pendaftaran Member</h1>
            <div class="mx-10 my-5 shadow-lg hover:shadow-xl py-3 rounded-xl duration-300">
                <form action="{{ route('pendaftaranDriver') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="px-10 lg:flex lg:flex-wrap lg:justify-between">
                        <div class="lg:block">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Nama</h1>
                            <div class="lg:flex lg:gap-12">
                                <div class="mb-4">
                                    <label for="nama"
                                        class="lg:w-[320px] relative block rounded-md border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                        <input type="text" id="nama" name="nama"
                                            class="peer w-full border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0"
                                            placeholder="Masukkan Nama Anda" required />
                                        <span
                                            class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                            Masukkan Nama Anda
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="lg:block">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Nomor Induk Kependudukan (NIK)</h1>
                            <div class="mb-4">
                                <label for="nik"
                                    class="lg:w-96 relative block rounded-md border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                    <input type="text" id="nik" name="nik"
                                        class="peer w-full border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0"
                                        placeholder="Masukkan Nomor KTP Anda" required />
                                    <span
                                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                        Masukkan NIK Anda
                                    </span>
                                </label>
                                <p id="warning-message" class="text-sm mt-1"></p>
                            </div>
                        </div>
                        <div class="lg:block">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Jenis Kelamin</h1>
                            <div class="mb-4">
                                <label for="jk"
                                    class="lg:w-96 relative block rounded-md border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                    <select id="jk" name="jk"
                                        class="border-none text-base text-gray-700 bg-transparent w-full placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0"
                                        required>
                                        <option selected>Jenis Kelamin</option>
                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="px-10 py-4 lg:flex lg:flex-wrap lg:gap-12">
                        <div class="lg:block lg:w-1/3">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Nomor Telepon</h1>
                            <div class="mb-4">
                                <label for="no_telepon"
                                    class="relative block rounded-md border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                    <input type="text" id="no_telepon" name="phone"
                                        class="peer border-none bg-transparent w-full placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0"
                                        placeholder="Masukkan Nomor Telepon Anda" required />
                                    <span
                                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                        Masukkan Nomor Telepon Anda
                                    </span>
                                </label>
                                <p id="phone-warning-message" class="text-sm mt-1"></p>
                            </div>
                        </div>
                        <div class="lg:block lg:w-[62.3%]">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Alamat</h1>
                            <div class="mb-4">
                                <label for="alamat"
                                    class="lg: relative block rounded-md border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                    <textarea id="alamat" name="alamat" rows="5" placeholder="Masukkan Alamat Anda"
                                        class="border-none bg-transparent placeholder:text-base w-full focus:border-transparent focus:outline-none focus:ring-0"
                                        required></textarea>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="px-10 py-4 lg:flex lg:flex-wrap lg:gap-6">
                        <div class="lg:block lg:w-1/5">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Tanggal Lahir</h1>
                            <div class="mb-4">
                                <div class="relative">
                                    <input type="date" name="tanggal_lahir"
                                        class="bg-transparent border border-gray-300 text-gray-900 text-sm rounded-lg block w-full ps-2.5 p-2.5"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="lg:block lg:w-[32%]">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Tempat Lahir</h1>
                            <div class="mb-4">
                                <label for="TempatLahir"
                                    class="relative block rounded-md border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                    <input type="text" id="TempatLahir" name="tempat_lahir"
                                        class="peer border-none bg-transparent w-full placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0"
                                        placeholder="Masukkan Tempat Lahir Anda" required />
                                    <span
                                        class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                        Masukkan Tempat Lahir Anda
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="lg:block lg:w-[21%]">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Jenis Asuransi</h1>
                            <div class="mb-4">
                                <input type="text" id="asuransi" name="asuransi"
                                    class="bg-transparent border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Asuransi" required />
                            </div>
                        </div>
                        <div class="lg:block lg:w-[20.5%]">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Jenis SIM</h1>
                            <div class="mb-4">
                                <input type="text" id="sim" name="sim"
                                    class="bg-transparent border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Jenis SIM" required />
                            </div>
                        </div>
                    </div>
                    <div class="px-10 lg:flex lg:flex-wrap lg:gap-6">
                        <!-- KTP -->
                        <div class="lg:block lg:w-[32%]">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Upload Foto KTP</h1>
                            <div class="mb-4">
                                <div class="lg:flex items-center justify-center w-full">
                                    <input id="upload-ktp" type="file"
                                        class="lg:hidden block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-transparent focus:outline-none"
                                        accept=".png, .jpg" required />
                                    <label
                                        class="hidden lg:flex flex-col items-center justify-center w-full h-64 border border-gray-300 rounded-lg cursor-pointer bg-transparent hover:bg-gray-100">
                                        <div onclick="document.getElementById('upload-ktp').click()"
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <img id="ktp-preview" src="{{ asset('assets/img/cloudss.svg') }}"
                                                class="h-52 w-full rounded-xl" alt="">
                                        </div>
                                    </label>
                                </div>
                                <p id="error-message-ktp" class="mt-2 text-sm text-red-600"></p>
                            </div>
                        </div>
                        <!-- Pas Foto -->
                        <div class="lg:block lg:w-[32%]">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Upload Pas Foto 4x6</h1>
                            <div class="mb-4">
                                <div class="lg:flex items-center justify-center w-full">
                                    <input id="upload-foto" type="file" name="upload_foto"
                                        class="lg:hidden block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-transparent focus:outline-none"
                                        accept=".png, .jpg" required />
                                    <label
                                        class="hidden lg:flex flex-col items-center justify-center w-full h-64 border border-gray-300 rounded-lg cursor-pointer bg-transparent hover:bg-gray-100">
                                        <div onclick="document.getElementById('upload-foto').click()"
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <img id="foto-preview" src="{{ asset('assets/img/cloudss.svg') }}"
                                                class="h-52 w-full rounded-xl" alt="">
                                        </div>
                                    </label>
                                </div>
                                <p id="error-message-foto" class="mt-2 text-sm text-red-600"></p>
                            </div>
                        </div>
                        <!-- Truk -->
                        <div class="lg:block lg:w-[31.5%]">
                            <h1 class="text-lg font-semibold text-slate-900 mb-4">Upload Foto Truck</h1>
                            <div class="mb-4">
                                <div class="lg:flex items-center justify-center w-full">
                                    <input id="upload-truk" type="file" name="upload_truck"
                                        class="lg:hidden block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-transparent focus:outline-none"
                                        accept=".png, .jpg" required />
                                    <label
                                        class="hidden lg:flex flex-col items-center justify-center w-full h-64 border border-gray-300 rounded-lg cursor-pointer bg-transparent hover:bg-gray-100">
                                        <div onclick="document.getElementById('upload-truk').click()"
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <img id="truk-preview" src="{{ asset('assets/img/cloudss.svg') }}"
                                                class="h-52 w-full rounded-xl" alt="">
                                        </div>
                                    </label>
                                </div>
                                <p id="error-message-truk" class="mt-2 text-sm text-red-600"></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-10 lg:flex lg:justify-end">
                        <button type="submit" id="submit-button"
                            class="w-full my-6 py-2 bg-red-700 text-white font-semibold text-lg rounded-lg hover:bg-red-800 lg:w-1/6 lg:text-sm">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="{{ asset('assets/js/nikValidator.js') }}"></script>
    <script src="{{ asset('assets/js/phoneFormatter.js') }}"></script>
    <script src="{{ asset('assets/js/imageValidator.js') }}"></script>
@endsection
