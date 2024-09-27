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
                                <a href="{{ route('order.private') }}"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-red-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Private</a>
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
            <p class="uppercase mx-10 text-4xl mb-1 font-extrabold text-red-700">PRIVATE</p>
            <p class="mx-10 text-md mb-8 font-normal text-black">Cek harga ongkirmu disini, ya!</p>
            <form action="{{ route('order.pexecution') }}" method="POST">
                @csrf
                <input type="hidden" name="armada" value="{{ $armada->id }}">
                <input type="hidden" id="tipe_order" value="PRIVATE">
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
                                    class="block p-2.5 w-full z-0 text-sm text-gray-900 bg-gray-50 rounded-s-lg rounded-e-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                    placeholder="Masukkan Jumlah Muatan" required />
                                <select
                                    class="flex-shrink-0 z-0 inline-flex items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-s-0 border-gray-300 dark:border-gray-700 dark:text-white rounded-e-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                    <option value="1">/ton</option>
                                    <option value="2">/m³</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row md:justify-between mb-5 md:mb-5">
                        <div class="md:w-5/12 mb-5">
                            <label for="lokasi_pengambilan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
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
                                Tujuan Pengiriman
                            </label>
                            <select name="tujuan_pengantaran" id="tujuan_pengantaran"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option selected disabled>Pilih Lokasi Tujuan</option>
                                @foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}">{{ $destination->city }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row md:justify-between mb-5 md:mb-5 gap-3">
                        <div class="md:w-5/12 mb-5">
                            <label for="tanggal_berangkat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">
                                Tanggal Berangkat
                            </label>
                            <input type="date" name="tanggal_berangkat" id="tanggal_berangkat"
                                value="{{ $armada->departure_date }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="md:w-5/12 mb-5">
                            <label for="tanggal_sampai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Sampai
                            </label>
                            <input type="date" name="tanggal_sampai" id="tanggal_sampai"
                                value="{{ $armada->arrival_date }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                    </div>
                    <div id="negosiasi" class="flex flex-col md:flex-row md:justify-end mb-5 md:mb-5 gap-3">
                        <div class="w-auto md:w-5/12 mb-5">
                            <label for="negosiasi"
                                class="block flex items-center gap-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Ajukan Negosiasi *(Opsional)
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                    width="20px" fill="##1f2937">
                                    <title>Isi Kolom Ini Jika Anda Ingin Melakukan Negosiasi</title>
                                    <path
                                        d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                </svg>
                            </label>
                            <input type="number" name="negosiasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Harga Negosiasi Anda" />
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
                        <div class="container md:flex md:justify-end gap-4">
                            <button type="submit" id="buttonNego" name="nego_harga" disabled
                                class="focus:outline-none text-white bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-12 py-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Nego Harga
                            </button>
                            <button type="submit" id="buttonSubmit" name="bayar" disabled
                                class="focus:outline-none text-white bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-12 py-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Bayar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // tidak bisa memilih tanggal yang sudah lewat
                var today = new Date().toISOString().split('T')[0];
                var dateB = document.getElementById('tanggal_berangkat');
                var dateS = document.getElementById('tanggal_sampai');
                dateB.setAttribute('min', today);
                dateS.setAttribute('min', today);
                dateB.value = today;
                dateS.value = today;

                const cekHargaButton = document.getElementById('cekHargaButton');
                const bayarButton = document.getElementById('buttonSubmit');
                const negoButton = document.getElementById('buttonNego');
                cekHargaButton.addEventListener('click', function() {
                    const tipeOrder = document.getElementById('tipe_order').value;
                    const jumlahMuatan = document.getElementById('jumlah_muatan').value;
                    const lokasi = document.getElementById('lokasi').value;
                    const tujuan = document.getElementById('tujuan_pengantaran').value;
                    const tgl_berangkat = document.getElementById('tanggal_berangkat').value;
                    const tgl_sampai = document.getElementById('tanggal_sampai').value;

                    fetch('{{ route('calculate.price') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                tipeOrder: tipeOrder,
                                jumlah_muatan: jumlahMuatan,
                                keberangkatan: lokasi,
                                tujuan: tujuan,
                                tanggal_berangkat: tgl_berangkat,
                                tanggal_sampai: tgl_sampai
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

                            negoButton.removeAttribute('disabled');
                            negoButton.classList.remove('bg-red-500');
                            negoButton.classList.add('bg-red-700', 'hover:bg-red-800');
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        </script>
        {{-- <script>
            document.getElementById('cekHargaButton').addEventListener('click', function() {
                const lokasiPengambilan = document.getElementById('lokasi_pengambilan').value;
                const tujuan = document.getElementById('tujuan').value;
                const jumlahMuatan = document.getElementById('jumlah_muatan').value;

                if (lokasiPengambilan && tujuan && jumlahMuatan) {
                    fetch(`/get-rate?departure_id=${lokasiPengambilan}&arrive_id=${tujuan}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('API Response:', data);
                            const rate = data.rate || 0;
                            const totalHarga = rate * jumlahMuatan;
                            document.getElementById('harga').value = totalHarga;
                            document.getElementById('harga_display').innerText =
                                `Rp ${totalHarga.toLocaleString()}`;
                        })
                        .catch(error => console.error('Error fetching rate:', error));
                } else {
                    alert('Silakan pilih lokasi pengambilan, tujuan, dan masukkan jumlah muatan.');
                }
            });
        </script> --}}
        </div>
    </section>
@endsection
