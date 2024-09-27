@extends('master')
@section('content')
    <div class="">
        <div class="container mx-auto p-4">
            <!-- Back Icon and Heading -->
            <div class="mt-6 flex items-center">
                <!-- Back Icon -->
                <button onclick="window.history.back();" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <!-- Heading -->
                <p class="mr-4 text-2xl font-extrabold text-center w-full">Tambah Armada Reguler</p>
            </div>

            <div
                class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <form action="{{ route('aksi.tambahArmada') }}" method="POST">
                    @csrf
                    <div class="col-span-1 sm:col-span-2 flex flex-col items-center mt-4">
                        <img id="avatar-preview" class="w-48 h-48 rounded-full mb-4"
                            src="{{ asset('assets/img/user.svg') }}" alt="Default avatar">
                        <input id="upload-avatar" type="file" class="hidden" accept="image/*">
                        <p id="error-message" class="mt-2 text-sm text-red-600"></p>
                    </div>

                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16 ">
                        <div class="mb-5">
                            <label for="driver" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                Sopir</label>
                            <select name="driver" id="driver"
                                class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option selected disabled>Pilih Sopir</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->id }} - {{ $driver->fullname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="kapasitas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kapasitas</label>
                            <input type="number" name="kapasitas" id="kapasitas" placeholder="Masukkan Kapasitas Per Ton"
                                class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="mb-5">
                            <label for="orderType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe
                                Order</label>
                            <select name="orderType" id="orderType"
                                class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option selected disabled>Pilih Tipe Order</option>
                                <option value="REGULER">Reguler</option>
                                <option value="PRIVATE">Private</option>
                            </select>
                        </div>
                        <div id="order-details">
                            <div class="mb-5">
                                <label for="tujuan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tujuan</label>
                                <select name="tujuan" id="tujuan"
                                    class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected disabled>Pilih Tujuan Pengiriman</option>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}">{{ $destination->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="max-w-2xl grid gap-4 sm:gap-6 grid-cols-1 sm:grid-cols-2">
                                <div class="mb-5">
                                    <label for="tanggal_berangkat"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Pemberangkatan</label>
                                    <input type="date" name="tanggal_berangkat" id="tanggal_berangkat"
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date">
                                </div>
                                <div class="mb-5">
                                    <label for="tanggal_sampai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estimasi
                                        Tanggal
                                        Sampai</label>
                                    <input type="date" name="tanggal_sampai" id="tanggal_sampai"
                                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-start mr-12">
                            <button type="submit"
                                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- <script src="{{ asset('assets/js/phoneFormatter.js') }}"></script> -->
        <script src="{{ asset('assets/js/imageValidator.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

        <script>
            document.getElementById('driver').addEventListener('change', function() {
                var driverId = this.value;
                fetch(`/get-truck-image/${driverId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('avatar-preview').src = data.filepath;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });

            document.getElementById('orderType').addEventListener('change', function() {
                var orderType = this.value;
                var orderDetails = document.getElementById('order-details');
                if (orderType === 'REGULER') {
                    orderDetails.style.display = 'block';
                } else {
                    orderDetails.style.display = 'none';
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                var orderType = document.getElementById('orderType').value;
                var orderDetails = document.getElementById('order-details');
                if (orderType !== 'REGULER') {
                    orderDetails.style.display = 'none';
                }
            });
        </script>
    @endsection
