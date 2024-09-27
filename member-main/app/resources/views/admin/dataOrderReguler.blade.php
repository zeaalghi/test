@extends('master')
@section('content')
    <div class="">
        <div class="mt-10">
            <p class="text-2xl font-extrabold">DATA ORDER REGULER</p>
        </div>
        <div
            class="mt-8 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex justify-between mb-4 items-center" id="searchAndButtonContainer">

            </div>
            <div class="w-full overflow-x-auto mt-4 rounded-lg">
                <table id="private" class="w-fulltable-auto">
                    <thead class="text-white text-left uppercase bg-red-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-4 py-2">NAMA PELANGGAN</th>
                            <th class="px-4 py-2">NO. TELEPON PELANGGAN</th>
                            <th class="px-4 py-2">NAMA DRIVER</th>
                            <th class="px-4 py-2">NO. TELEPON DRIVER</th>
                            <th class="px-4 py-2">JENIS MUATAN</th>
                            <th class="px-4 py-2">BERAT MUATAN</th>
                            <th class="px-4 py-2">PENGAMBILAN</th>
                            <th class="px-4 py-2">Tujuan</th>
                            <th class="px-4 py-2">Tanggal Pengiriman</th>
                            <th class="px-4 py-2">Tanggal Sampai</th>
                            <th class="px-4 py-2">Tanggal Pemesanan</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">BUKTI PEMBYARAN</th>
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
                                <td class="px-6 py-4 text-left whitespace-nowrap border-b border-gray-300">
                                    {{ $order->payload }}</td>
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
                                <td class="px-6 py-2 flex justify-center border-b border-gray-300">
                                    <a href="{{ route('buktiPembayaran', ['filename' => $order->transactions->filepath]) }}"
                                        target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 -960 960 960"
                                            width="36px" fill="#374151">
                                            <path
                                                d="M240-80q-50 0-85-35t-35-85v-120h120v-560l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v680q0 50-35 85t-85 35H240Zm480-80q17 0 28.5-11.5T760-200v-560H320v440h360v120q0 17 11.5 28.5T720-160ZM360-600v-80h240v80H360Zm0 120v-80h240v80H360Zm320-120q-17 0-28.5-11.5T640-640q0-17 11.5-28.5T680-680q17 0 28.5 11.5T720-640q0 17-11.5 28.5T680-600Zm0 120q-17 0-28.5-11.5T640-520q0-17 11.5-28.5T680-560q17 0 28.5 11.5T720-520q0 17-11.5 28.5T680-480ZM240-160h360v-80H200v40q0 17 11.5 28.5T240-160Zm-40 0v-80 80Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
    </script>
@endsection
