@extends('master')
@section('content')
    <div class="">
        <div class="mt-10">
            <p class="text-2xl font-extrabold uppercase">Data Order Private</p>
        </div>
        <div
            class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between mb-4 items-center" id="searchAndButtonContainer">

            </div>
            <div class="w-full overflow-x-auto mt-4 rounded-lg">
                <table id="private" class="table-auto w-full">
                    <thead class="text-white text-left uppercase bg-red-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-4 py-2 ">NAMA PELANGGAN</th>
                            <th class="px-4 py-2 ">NO. TELEPON PELANGGAN</th>
                            <th class="px-4 py-2 ">NAMA DRIVER</th>
                            <th class="px-4 py-2 ">NO. TELEPON DRIVER</th>
                            <th class="px-4 py-2 ">JENIS MUATAN</th>
                            <th class="px-4 py-2 ">BERAT MUATAN</th>
                            <th class="px-4 py-2 ">PENGAMBILAN</th>
                            <th class="px-4 py-2 ">Tujuan</th>
                            <th class="px-4 py-2 ">Tanggal Pengiriman</th>
                            <th class="px-4 py-2 ">Tanggal Sampai</th>
                            <th class="px-4 py-2 ">Tanggal Pemesanan</th>
                            <th class="px-4 py-2 ">Harga</th>
                            <th class="px-4 py-2 ">Negosiasi Harga</th>
                            <th class="px-4 py-2 ">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $order)
                            <tr
                                class="bg-white uppercase border-b font-normal text-sm dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 text-left whitespace-nowrap border-b border-gray-300">
                                    {{ $order->users->name }}</td>
                                <td class="px-6 py-4 text-left border-b border-gray-300">{{ $order->users->phone }}</td>
                                <td class="px-6 py-4 text-left whitespace-nowrap border-b border-gray-300">
                                    {{ $order->fleets->drivers->fullname }}</td>
                                <td class="px-6 py-4 text-left border-b border-gray-300">
                                    {{ $order->fleets->drivers->phone }}</td>
                                <td class="px-6 py-4 text-left border-b border-gray-300">{{ $order->payload }}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-300">{{ $order->payload_weight }} ton
                                </td>
                                <td class="px-6 py-4 text-left border-b border-gray-300">
                                    {{ $order->pickup_destination->city }}</td>
                                <td class="px-6 py-4 text-left border-b border-gray-300">
                                    {{ $order->delivery->city }}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-300">
                                    {{ $order->fleets->departure_date }}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-300">
                                    {{ $order->fleets->arrival_date }}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-300">
                                    {{ $order->order_date }}</td>
                                <td class="px-6 py-4 text-left whitespace-nowrap border-b border-gray-300">Rp
                                    {{ $order->price }}</td>
                                <td class="px-6 py-4 text-left whitespace-nowrap border-b border-gray-300">
                                    {{ $order->negotiation ? 'Rp ' . $order->negotiation : '-' }}
                                </td>
                                <td class="px-4 py-2 justify-center flex gap-4 border-b border-gray-300">
                                    @if ($order->status == 'Paid')
                                        <a href="{{ route('buktiPembayaran', ['filename' => $order->transactions->filepath]) }}"
                                            target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 -960 960 960"
                                                width="36px" fill="#374151">
                                                <path
                                                    d="M240-80q-50 0-85-35t-35-85v-120h120v-560l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v680q0 50-35 85t-85 35H240Zm480-80q17 0 28.5-11.5T760-200v-560H320v440h360v120q0 17 11.5 28.5T720-160ZM360-600v-80h240v80H360Zm0 120v-80h240v80H360Zm320-120q-17 0-28.5-11.5T640-640q0-17 11.5-28.5T680-680q17 0 28.5 11.5T720-640q0 17-11.5 28.5T680-600Zm0 120q-17 0-28.5-11.5T640-520q0-17 11.5-28.5T680-560q17 0 28.5 11.5T720-520q0 17-11.5 28.5T680-480ZM240-160h360v-80H200v40q0 17 11.5 28.5T240-160Zm-40 0v-80 80Z" />
                                            </svg>
                                        </a>
                                    @else
                                        <a href="{{ route('orderPrivateDiterima', ['order' => $order->id]) }}">
                                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M22 11.0857V12.0057C21.9988 14.1621 21.3005 16.2604 20.0093 17.9875C18.7182 19.7147 16.9033 20.9782 14.8354 21.5896C12.7674 22.201 10.5573 22.1276 8.53447 21.3803C6.51168 20.633 4.78465 19.2518 3.61096 17.4428C2.43727 15.6338 1.87979 13.4938 2.02168 11.342C2.16356 9.19029 2.99721 7.14205 4.39828 5.5028C5.79935 3.86354 7.69279 2.72111 9.79619 2.24587C11.8996 1.77063 14.1003 1.98806 16.07 2.86572M22 4L12 14.01L9 11.01"
                                                    stroke="black" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <button data-modal-toggle="tolak-modal" data-modal-target="tolak-modal"
                                            data-order-id="{{ $order->id }}">
                                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15 9L9 15M9 9L15 15M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                    stroke="black" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="tolak-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex text-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg text-center font-semibold text-gray-900 dark:text-white">
                        Tolak Pesanan Ini
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
                <form class="p-4 md:p-5" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="alasan" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">
                                Alasan
                            </label>
                            <textarea id="alasan" name="alasan" rows="5"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Mengapa menolak pesanan ini?" required></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#private').DataTable({
                scrollX: true,
                dom: '<"top"f>rt<"bottom"lip><"clear">',
                initComplete: function() {

                    // Insert the search bar and button into the container
                    $('#searchAndButtonContainer').append($('.dataTables_filter'));
                    $('.dataTables_filter label').contents().filter(function() {
                        return this.nodeType === 3; // Node.TEXT_NODE
                    }).remove();
                    // Style the search bar
                    $('.dataTables_filter label input').attr('placeholder', 'Search').css({
                        'background-color': '#fff',
                        'padding': '6px',
                        'box-shadow': '0 2px 2px -1px rgba(0, 0, 0, 0.1)',
                        'border-radius': '0.375rem' // Adding border-radius to match the button
                    });

                    // Style the button
                    $('#tambahButton').css({
                        'padding': '10px 16px', // Increase padding for a longer button
                        'font-size': '14px' // Slightly larger font size
                    });

                    // Apply media queries for responsiveness using CSS
                    var style = document.createElement('style');
                    style.innerHTML = `
                @media (max-width: 768px) {
                    #searchAndButtonContainer {
                        flex-direction: row;
                        justify-content: space-between;
                    }
                    .dataTables_filter input {
                        width: 100px; /* Smaller input size */
                    }
                    #tambahButton {
                        padding: 8px 12px; /* Smaller button padding */
                        font-size: 12px; /* Smaller font size */
                    }
                }
            `;
                    document.head.appendChild(style);
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var tolakButton = document.querySelectorAll('[data-modal-toggle="tolak-modal"]');

            tolakButton.forEach(function(button) {
                button.addEventListener('click', function() {
                    var orderId = button.getAttribute('data-order-id');
                    var modal = document.getElementById('tolak-modal');

                    modal.querySelector('form').action = `orderan-private-ditolak/${orderId}`;
                });
            });
        });
    </script>
@endsection
