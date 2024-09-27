@extends('master')
@section('content')
    <section>
        <div class="container mx-auto mt-28 mb-8">
            <div class="container px-10">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="{{ route('index') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-red-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="{{ route('index') }}"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-red-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Order</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="{{ route('order.regular') }}"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-red-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Regular</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Bayar</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section>
        <div class="container mx-auto">
            <p class="uppercase mx-10 text-4xl mb-1 font-extrabold text-red-700">Regular</p>
            <p class="mx-10 text-md mb-8 font-normal text-black">Cek harga ongkirmu disini, ya!</p>
            <form action="{{ route('order.execution') }}" method="POST">
                @csrf
                <input type="hidden" name="armada" value="{{ $armada->id }}">
                <div class="mx-10 my-5 py-3 rounded-xl w-auto">
                    <div class="flex flex-col md:flex-row md:justify-between mb-5 md:mb-5">
                        <div class="w-auto md:w-5/12 mb-5">
                            <label for="muatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jenis Muatan
                            </label>
                            <input type="text" name="muatan" id="muatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Jenis Muatan" required />
                        </div>
                        <div class="md:w-5/12">
                            <label for="jumlah_muatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jumlah Muatan
                            </label>
                            <div class="flex">
                                <input type="number" name="jumlah_muatan" id="jumlah_muatan"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-s-lg rounded-e-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                    placeholder="Masukkan Jumlah Muatan" required />
                                <select
                                    class="flex-shrink-0 inline-flex items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-s-0 border-gray-300 dark:border-gray-700 dark:text-white rounded-e-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                    <option value="1">/ton</option>
                                    <option value="2">/m³</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row md:justify-between mb-5 md:mb-5">
                        <div class="md:w-5/12 mb-5">
                            <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Lokasi Pengambilan
                            </label>
                            <select name="lokasi" id="lokasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option selected disabled>Pilih Lokasi Pengambilan</option>
                                @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}">{{ $destination->city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:w-5/12">
                            <label for="tujuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tujuan Pengantaran
                            </label>
                            <input type="hidden" name="tujuan_pengantaran" id="tujuan_pengantaran"
                                value="{{ $armada->destinations_id }}">
                            <input type="text" value="{{ $armada->destinations->city }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                readonly />
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row md:justify-between mb-5 md:mb-5">
                        <div class="md:w-5/12 mb-5">
                            <label for="tanggal_berangkat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Berangkat
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 end-4 flex items-center ps-3.5 pointer-events-none">
                                    <svg width="20" height="23" viewBox="0 0 20 23" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 9.5H1M14 1.5V5.5M6 1.5V5.5M8.5 13.5L10 12.5V17.5M8.75 17.5H11.25M5.8 21.5H14.2C15.8802 21.5 16.7202 21.5 17.362 21.173C17.9265 20.8854 18.3854 20.4265 18.673 19.862C19 19.2202 19 18.3802 19 16.7V8.3C19 6.61984 19 5.77976 18.673 5.13803C18.3854 4.57354 17.9265 4.1146 17.362 3.82698C16.7202 3.5 15.8802 3.5 14.2 3.5H5.8C4.11984 3.5 3.27976 3.5 2.63803 3.82698C2.07354 4.1146 1.6146 4.57354 1.32698 5.13803C1 5.77976 1 6.61984 1 8.3V16.7C1 18.3802 1 19.2202 1.32698 19.862C1.6146 20.4265 2.07354 20.8854 2.63803 21.173C3.27976 21.5 4.11984 21.5 5.8 21.5Z"
                                            stroke="black" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <input type="date" name="tanggal_berangkat" id="tanggal_berangkat"
                                    value="{{ $armada->departure_date }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    readonly />
                            </div>
                        </div>
                        <div class="md:w-5/12 mb-5">
                            <label for="tanggal_sampai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Sampai
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 end-4 flex items-center ps-3.5 pointer-events-none">
                                    <svg width="20" height="23" viewBox="0 0 20 23" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 9.5H1M14 1.5V5.5M6 1.5V5.5M8.5 13.5L10 12.5V17.5M8.75 17.5H11.25M5.8 21.5H14.2C15.8802 21.5 16.7202 21.5 17.362 21.173C17.9265 20.8854 18.3854 20.4265 18.673 19.862C19 19.2202 19 18.3802 19 16.7V8.3C19 6.61984 19 5.77976 18.673 5.13803C18.3854 4.57354 17.9265 4.1146 17.362 3.82698C16.7202 3.5 15.8802 3.5 14.2 3.5H5.8C4.11984 3.5 3.27976 3.5 2.63803 3.82698C2.07354 4.1146 1.6146 4.57354 1.32698 5.13803C1 5.77976 1 6.61984 1 8.3V16.7C1 18.3802 1 19.2202 1.32698 19.862C1.6146 20.4265 2.07354 20.8854 2.63803 21.173C3.27976 21.5 4.11984 21.5 5.8 21.5Z"
                                            stroke="black" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <input type="date" name="tanggal_sampai" id="tanggal_sampai"
                                    value="{{ $armada->arrival_date }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    readonly />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container flex md:justify-end mx-10 my-5 py-6 border-t w-auto border-black border-dashed">
                    <div class="md:justify-end md:text-end">
                        <div class="p-1">
                            <button type="button" id="cekHargaButton"
                                class="text-lg font-medium tracking-tight text-red-600 dark:text-white">
                                Klik untuk Cek Harga terlebih dahulu
                            </button>
                        </div>
                        <input type="hidden" name="harga" id="harga">
                        <p class="mb-8 text-4xl font-bold text-gray-700 dark:text-gray-400" id="harga_display">
                            Rp 0
                        </p>
                        <div class="container md:flex md:justify-end">
                            <button type="submit" id="buttonSubmit" disabled
                                class="focus:outline-none text-white bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-12 py-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Bayar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="{{ asset('assets/js/muatanValidator.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cekHargaButton = document.getElementById('cekHargaButton');
            const bayarButton = document.getElementById('buttonSubmit');
            cekHargaButton.addEventListener('click', function() {
                const jumlahMuatan = document.getElementById('jumlah_muatan').value;
                const lokasi = document.getElementById('lokasi').value;
                const tujuan = document.getElementById('tujuan_pengantaran').value;

                fetch('{{ route('calculate.price') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            jumlah_muatan: jumlahMuatan,
                            keberangkatan: lokasi,
                            tujuan: tujuan
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        const hargaElement = document.getElementById('harga');
                        const hargaDisplay = document.getElementById('harga_display');
                        hargaElement.value = data.totalPrice;
                        hargaDisplay.textContent = `Rp ${data.totalPrice.toLocaleString()}`;

                        bayarButton.removeAttribute('disabled');
                        bayarButton.classList.remove('bg-red-500');
                        bayarButton.classList.add('bg-red-700', 'hover:bg-red-800');
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
@endsection
