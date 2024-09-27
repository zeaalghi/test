@extends('master')
@section('content')
    <div class="">
        <div class="mt-10">
            <p class="text-2xl font-extrabold">KONFIGURASI</p>
        </div>
        <div class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <form class="max-w-sm mx-auto" action="{{ route('konfigurasi.edit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat dan Tanggal Tanda Tangan</label>
                    <input type="text" id="base-input" name="tgl" value="{{ $tanggal }}" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Ketua</label>
                    <input type="text" id="base-input" name="ketua" value="{{ $ketua }}" class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File Tanda Tangan</label>
                <div class=" mb-5 flex items-center justify-start w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-1/2 h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <img id="preview-image" src="{{ asset('storage/images/' . $ttdketua) }}" alt="Tanda Tangan Ketua" class="h-20">
                        </div>
                        <input id="dropzone-file" type="file" name="ttd" class="hidden" onchange="previewFile()" />
                    </label>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        function previewFile() {
            const preview = document.getElementById('preview-image');
            const file = document.getElementById('dropzone-file').files[0];
            const reader = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
