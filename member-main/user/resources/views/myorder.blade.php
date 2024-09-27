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
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Order
                                    Saya</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section>
        <div class="container mx-auto">
            <p class="mx-10 text-4xl mb-1 font-extrabold text-red-700">Order Saya</p>
            <p class="mx-10 text-md mb-8 font-normal text-black">Lihat riwayat pesananmu disini!</p>
            <div class="mx-10 mb-10 rounded-xl">
                <div class="relative overflow-x-auto shadow-md rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-white bg-red-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center w-1/12">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Muatan
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Lokasi Pengambilan
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Tujaun Pengiriman
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Jenis Order
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Tanggal Order
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3 text-center w-4/12">
                                    Opsi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 text-center">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{ $order->payload }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $order->pickup_destination->city }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $order->delivery->city }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $order->order_type }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        {{ $order->order_date }}
                                    </td>
                                    <td class="px-2 py-4 whitespace-nowrap text-center">
                                        IDR {{ $order->price }}
                                    </td>
                                    <td class="px-6 py-4 justify-center flex items-center gap-x-1">
                                        @if ($order->status == 'Negotiation')
                                            <a href=""
                                                class="inline-flex items-center px-6 py-2 text-sm font-medium text-center text-white bg-amber-500 rounded-lg hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                Proses Negosiasi
                                            </a>
                                        @elseif ($order->status == 'In Progress')
                                            <a href=""
                                                class="inline-flex items-center px-6 py-2 text-sm font-medium text-center text-white bg-amber-500 rounded-lg hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 whitespace-nowrap">
                                                Orderan Private dalam Proses
                                            </a>
                                        @elseif($order->status == 'Order Private Rejected')
                                            <button data-modal-toggle="tolak-modal" data-modal-target="tolak-modal"
                                                data-order-alasan="{{ $order->note }}"
                                                class="inline-flex items-center px-12 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 whitespace-nowrap">
                                                Orderan Private Ditolak!
                                            </button>
                                        @elseif($order->status == 'Negotiation Rejected')
                                            <button data-modal-toggle="tolak-modal" data-modal-target="tolak-modal"
                                                data-order-alasan="{{ $order->note }}"
                                                class="inline-flex items-center px-12 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 whitespace-nowrap">
                                                Negosiasi Ditolak!
                                            </button>
                                        @elseif($order->status == 'Order Private Approved')
                                            <a href=""
                                                class="inline-flex items-center px-6 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-red-700 dark:focus:ring-green-800 whitespace-nowrap">
                                                Orderan Private Diterima
                                            </a>
                                            <a href="{{ route('order.nota', ['orderId' => $order->id]) }}"
                                                class="inline-flex items-center px-6 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="18px"
                                                    viewBox="0 -960 960 960" width="18px" fill="#e8eaed">
                                                    <path
                                                        d="M444-288h72v-240h-72v240Zm35.79-312q15.21 0 25.71-10.29t10.5-25.5q0-15.21-10.29-25.71t-25.5-10.5q-15.21 0-25.71 10.29t-10.5 25.5q0 15.21 10.29 25.71t25.5 10.5Zm.49 504Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z" />
                                                </svg>
                                                <span class="px-3">Nota</span>
                                            </a>
                                        @elseif($order->status == 'Negotiation Approved')
                                            <a href=""
                                                class="inline-flex items-center px-6 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-red-700 dark:focus:ring-green-800 whitespace-nowrap">
                                                Negosiasi Diterima
                                            </a>
                                            <a href="{{ route('order.nota', ['orderId' => $order->id]) }}"
                                                class="inline-flex items-center px-6 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="18px"
                                                    viewBox="0 -960 960 960" width="18px" fill="#e8eaed">
                                                    <path
                                                        d="M444-288h72v-240h-72v240Zm35.79-312q15.21 0 25.71-10.29t10.5-25.5q0-15.21-10.29-25.71t-25.5-10.5q-15.21 0-25.71 10.29t-10.5 25.5q0 15.21 10.29 25.71t25.5 10.5Zm.49 504Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z" />
                                                </svg>
                                                <span class="px-3">Nota</span>
                                            </a>
                                        @else
                                            <a href="{{ route('order.nota', ['orderId' => $order->id]) }}"
                                                class="inline-flex items-center px-6 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="18px"
                                                    viewBox="0 -960 960 960" width="18px" fill="#e8eaed">
                                                    <path
                                                        d="M444-288h72v-240h-72v240Zm35.79-312q15.21 0 25.71-10.29t10.5-25.5q0-15.21-10.29-25.71t-25.5-10.5q-15.21 0-25.71 10.29t-10.5 25.5q0 15.21 10.29 25.71t25.5 10.5Zm.49 504Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z" />
                                                </svg>
                                                <span class="px-3">Nota</span>
                                            </a>
                                            @if ($order->status == 'Paid')
                                                <a href="{{ route('user.myPembayaran', ['orderId' => $order->id]) }}"
                                                    class="inline-flex items-center px-6 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-red-700 dark:focus:ring-green-800 whitespace-nowrap">
                                                    Lihat Pembayaran
                                                </a>
                                            @else
                                                <a href="{{ route('order.konfirmasi', ['orderId' => $order->id]) }}"
                                                    class="inline-flex items-center px-6 py-2 text-sm font-medium text-center text-white bg-amber-500 rounded-lg hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 whitespace-nowrap">
                                                    Kirim Pembayaran
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div id="tolak-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex text-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg text-center font-semibold text-gray-900 dark:text-white">
                        Maaf, Orderan Anda Ditolak
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="tolak-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="alasan" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">
                                Alasan
                            </label>
                            <textarea id="alasan" rows="5"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Mengapa menolak negosiasi transaksi ini?" readonly></textarea>
                        </div>
                    </div>
                    <a href="{{ route('order.private') }}"
                        class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Silahkan order kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tolakButton = document.querySelectorAll('[data-modal-toggle="tolak-modal"]');

            tolakButton.forEach(function(button) {
                button.addEventListener('click', function() {
                    var alasan = button.getAttribute('data-order-alasan');
                    var modal = document.getElementById('tolak-modal');
                    var alasanTextArea = modal.querySelector('#alasan');
                    alasanTextArea.value = alasan;
                });
            });
        });
    </script>
@endsection
