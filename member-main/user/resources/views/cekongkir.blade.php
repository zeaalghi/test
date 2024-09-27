@extends('master')
@section('content')
    <section>
        <div class="container mx-auto py-24">
            <p class="mx-10 text-4xl mb-1 font-extrabold text-red-700">Cek Ongkir</p>
            <p class="mx-10 text-md mb-8 font-normal text-black">Cek harga ongkirmu disini, ya!</p>
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
                        <div class="relative">
                            <div class="absolute inset-y-0 end-4 flex items-center ps-3.5 pointer-events-none">
                                <span>/ton</span>
                            </div>
                            <input type="text" name="jumlah_muatan" id="jumlah_muatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Jumlah Muatan" required />
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
                        <label for="tujuan_pengantaran"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tujuan Pengantaran
                        </label>
                        <select name="tujuan_pengantaran" id="tujuan_pengantaran"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Pilih Tujuan Pengantaran</option>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->city }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="container flex md:justify-end mx-10 my-5 py-6 border-t w-auto border-black border-dashed">
                <div class="md:justify-end md:text-end">
                    <p class="mb-8 text-4xl font-bold text-gray-700 dark:text-gray-400" id="harga">
                        Rp 0
                    </p>
                    <div class="container md:flex md:justify-end">
                        <button type="button" id="cekHargaButton"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-12 py-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            Cek Harga
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cekHargaButton = document.getElementById('cekHargaButton');
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
                        hargaElement.textContent = `Rp ${data.totalPrice.toLocaleString()}`;
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
@endsection
